<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use App\Projection;

class Theater extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'n_rows', 'n_columns', 'deleted_at',
    ];

    public function projections()
    {
        return $this->hasMany('App\Projection');
    }

    public function getTheaterUsageOfFilm()
    {
        $time = 0;
        foreach ($this->projections as $each) {
            $time += $each->film->minutes_duration;
        }

        $first_projection = Projection::orderBy('begin', 'ASC')->first();

        return $time/(Carbon::now()->diffInMinutes($first_projection->begin));
    }
}
