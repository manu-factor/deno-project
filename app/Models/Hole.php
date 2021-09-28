<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Hole extends Model {

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name', 'location', 'lat', 'long', 'agency', 'DOI', 'tapping', 'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     */
    protected $hidden = [];

}
