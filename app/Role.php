<?php

namespace App;

use App\BaseModel;

class Role extends BaseModel
{
    protected $table = 'roles';
	
    /**
	 * Fillable fields for the table: Roles
	 * 
	 * @var array
	 */
    protected $fillable = [
        'name'
    ];
    
}
