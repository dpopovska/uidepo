<?php

namespace App;

use App\BaseModel;

class Design extends BaseModel
{
	protected $table = 'designs';
	
    /**
	 * Fillable fields for the table: Designs
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'title', 'slug', 'categories_id', 'description', 'zip_link', 'backlink', 'featured_thumbnail', 'regular_thumbnail', 
        'preview_img', 'help_document', 'users_id', 'full_name', 'email_address', 'views', 'status'
    ];

    /**
     * (1:m relationship) with the categories table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * (1:m relationship) with the users table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * (m:m relationship) with the tags table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * Convert the array of strings to the valid JSON array (for CREATE method)
     * OR keep the existing JSON array (for the UPDATE method)
     */
    public function setPreviewImgAttribute($value)
    {
        $this->attributes['preview_img'] = (is_string($value) && is_array(json_decode($value, true)))
            ? $value
            : json_encode($value); 
    }

    /**
     * Convert all applicable characters to HTML entities before saving
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = htmlentities($value, ENT_COMPAT, 'UTF-8');
    }

    /**
     * Decode the json preview images before showing them
     */
    public function getPreviewImgAttribute($value)
    {
        return (!is_null($value)) ? json_decode($value) : [];
    }

    /**
     * Convert the status to string value before showing
     */
    public function getStatusAttribute($value)
    {
        return ($value === 1) ? 'Published' : 'Submitted';
    }

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

    /**
     * Get the result by the given id parameter
     * 
     * @param  integer  $id
     * @return object \App\Design
     */
    public function getDesignById($id)
    {
        return $this->whereId($id)->first();
    }
}
