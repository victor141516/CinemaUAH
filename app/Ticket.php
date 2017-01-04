<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cinema_id', 'projection_id', 'row', 'column', 'is_paid', 'token',
    ];

    public function projection()
    {
        return $this->belongsTo('App\Projection');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function bookedSeats($projection_id)
    {
    	return self::where('projection_id', $projection_id)
            ->where('is_paid', true)
            ->orWhere(function($query) {
                $query->where('is_paid', false)
                    ->where('created_at', '>', Carbon::now()->subMinute(10));
            });
    }
}
