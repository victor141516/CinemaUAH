<?php

namespace App;

use App\Actor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Film extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','synopsis','website','original_title',
        'genre','country','minutes_duration','year',
        'producer','director','age_rating','others',
        'has_image', 'deleted_at'];

    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function projections()
    {
        return $this->hasMany('App\Projection');
    }

    public static function getGenres()
    {
    	return self::groupBy('genre')->get()->pluck('genre');
    }

    public static function getAgeRatings()
    {
    	return self::groupBy('age_rating')->get()->pluck('age_rating');
    }

    public static function updateOrCreateWithActors($compare, $request)
    {
        $actors = [];
        if ($request->has('actors')) {
            $actor_names = explode(',', $request->actors);
            foreach ($actor_names as $each) {
                $actors[] = Actor::updateOrCreate(['name' => trim($each)])->id;
            }
        }
        $film = self::withTrashed()->updateOrCreate($compare, $request->all());
        $film->restore();
        $film->actors()->sync($actors);
        return $film;
    }

    public function cascadeDelete()
    {
        foreach ($this->projections as $each) {
            $each->tickets()->delete();
        }
        $this->projections()->delete();
        $this->delete();
    }

    public function ticketsCount()
    {
        $projections = $this->projections()->with('tickets')->get();
        $count = 0;
        foreach ($projections as $each) {
            $count += $each->tickets->count();
        }
        return $count;
    }
}
