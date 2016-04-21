<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GCMUser extends Model
{
    //
	protected $table = 'gcm_users';
	
	protected $primaryKey = 'id';
	
	protected $fillable = ['gcm_regid', 'name','email','mobile'];
}
