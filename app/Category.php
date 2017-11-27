<?php

namespace App;

use App\BaseModel;

class Category extends BaseModel
{
    protected $table = 'categories';
	
    /**
	 * Fillable fields for the table: Categories
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'name', 'link', 'status'
    ];

    /**
     * Scope a query to get all active items from the db.
     *
	 * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param integer  $status [0/1]
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query, $status = 1)
    {
        return $query->whereStatus($status);
    }
}
