<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
	protected $primaryKey = 'id_laundry';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_laundry', 'name','price', 'long', 'lat','image'];
}
