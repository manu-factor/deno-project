<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Hole extends Model {

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'owner_name', 'longitude', 'latitude', 'z_axis', 'category', 'mapsheet', 'SRO', 'DOI', 'the_type', 'file_no'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     * @var array
     */
    protected $hidden = [];
    public $timestamps = false;

}
