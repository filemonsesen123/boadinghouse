<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
	protected $primaryKey = 'id_food';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_food', 'name','image', 'description', 'long','lat', 'price', 'category'];
}
