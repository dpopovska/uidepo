<?php

namespace App;

use App\BaseModel;

class Subscription extends BaseModel
{
    protected $table = 'subscriptions';

    /**
	 * Fillable fields for the table: Subscriptions
	 * 
	 * @var array
	 */
    protected $fillable = ['email'];
}
