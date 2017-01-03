<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'user_id', 'film_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function film()
    {
        return $this->belongsTo('App\Film');
    }
}
