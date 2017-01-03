<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'n_rows', 'n_columns'
    ];

    public function projections()
    {
        return $this->hasMany('App\Projection');
    }
}
