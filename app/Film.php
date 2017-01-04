<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Actor;

class Film extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','synopsis','website','original_title',
        'genre','country','minutes_duration','year',
        'producer','director','age_rating','others',
        'has_image',];

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function projections()
    {
        return $this->hasMany('App\Projections');
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
        $film = self::updateOrCreate($compare, $request->all());
        $film->actors()->sync($actors);
        return $film;
    }
}
