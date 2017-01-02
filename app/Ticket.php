<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cinema_id', 'film_id'
    ];

    public function film()
    {
        return $this->belongsTo('App\Film');
    }
}
