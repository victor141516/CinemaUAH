<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','synopsis','website','original_title',
        'genre','country','minutes_duration','year',
        'producer','director','age_rating','others',
        'has_image',];

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }

    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }
}
