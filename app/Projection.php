<?php

namespace App;

use Carbon\Carbon;
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

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function getBeginHour()
    {
        return Carbon::parse($this->begin)->format("G:i");
    }

    public function getFormatedSeats()
    {
        $tickets = $this->tickets;

        $seats = [];
        foreach ($tickets as $each) {
            $seats[$each->id] = $each->row . '-' . $each->column;
        }

        return $seats;
    }
}
