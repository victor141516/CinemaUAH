<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projection extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'film_id', 'theater_id', 'begin'
    ];

    public function film()
    {
        return $this->belongsTo('App\Film');
    }

    public function theater()
    {
        return $this->belongsTo('App\Theater');
    }
}
