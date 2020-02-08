<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicFacility extends Model
{
	protected $primaryKey = 'id_public_facility';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_public_facility', 'name','buka', 'tutup', 'image','category', 'description', 'long','lat'];
}
