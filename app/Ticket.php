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
        'user_id', 'cinema_id', 'projection_id'
    ];

    public function projection()
    {
        return $this->belongsTo('App\Projection');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
