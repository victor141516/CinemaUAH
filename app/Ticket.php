<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'cinema_id', 'projection_id',
        'row', 'column', 'is_paid', 'token', 'admin_lock',
        'created_at', 'updated_at', 'deleted_at',
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
