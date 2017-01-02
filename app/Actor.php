<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function films()
    {
        return $this->belongsToMany('App\Film');
    }
}
