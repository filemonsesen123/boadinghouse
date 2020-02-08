<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyBills extends Model
{
	protected $primaryKey = 'id_bills';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_bills', 'id_user','status', 'id_category','paid', 'price','must_pay'];
}
