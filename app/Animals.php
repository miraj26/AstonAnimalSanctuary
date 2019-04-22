<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animals extends Model
{
	/**
	 * The attributes that are mass assignable.
	 * @var array
	 */
    protected $fillable = ['name', 'dob', 'description', 'image',];
}
