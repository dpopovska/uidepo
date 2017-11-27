<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    /**
	 * Fillable fields for the table: Contact
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'full_name', 'email_address', 'subject', 'message'
    ];
	
    /**
     * Get the validation rules for the table: Contact
     * 
     * @var array
     */
	public static function getValidationRules() 
	{
		return [
			'full_name' 	=> ['required', new \App\Rules\AlphaSpace],
			'email_address' => ['required', 'email'],
			'subject'		=> ['required', new \App\Rules\AlphaNumSpecialChar],
			'message'		=> ['required', new \App\Rules\AlphaNumSpecialChar],
		];
	}
    
}
