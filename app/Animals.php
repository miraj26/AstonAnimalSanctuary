<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animals extends Model
{
    protected $fillable = ['name', 'dob', 'description', 'picture', 'availablilty',];
}
