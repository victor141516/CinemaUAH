<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'user_id', 'film_id', 'deleted_at',
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
