<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaggedDesign extends Model
{
    protected $table = 'design_tag';

    /**
	 * Fillable fields for the table: Design_Tag
	 * 
	 * @var array
	 */
    protected $fillable = ['design_id', 'tag_id'];

    /**
     * Mutator for setting design_id attribute
     * @param App\Design  $design 
     */
    public function setDesignAttribute($design)
    {
    	$this->attribute['design_id'] = $design->getkey();
    	$this->setRelation('design', $design);
    }

    /**
     * Mutator for setting tag_id attribute
     * @param App\Tag  $tag
     */
    public function setTagAttribute($tag)
    {
    	$this->attribute['tag_id'] = $tag->getkey();
    	$this->setRelation('tag', $tag);
    }
}
