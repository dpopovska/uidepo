<?php

namespace App;

use App\BaseModel;

class Tag extends BaseModel
{
    protected $table = 'tags';

    /**
	 * Fillable fields for the table: Tags
	 * 
	 * @var array
	 */
    protected $fillable = ['name'];

    /**
     * (m:m relationship) with the designs table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function designs()
    {
        return $this->belongsToMany(Design::class);
    }
}
