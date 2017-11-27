<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roles_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Validation rules (creating new user)
     * 
     * @var array
     */
    public static $validationRules = [
        'name'           => 'required|max:255',
        'email'          => 'required|email|max:255|unique:users',
        'password'       => 'required|min:6',
        'roles_id'       => 'required|exists:roles,id'
    ];

    /**
     * Validation rules (password reset inside admin panel)
     *
     * @var array
     */
    public static $passResetRules = [
        'password'              => 'required|confirmed|min:6',
        'password_confirmation' => 'required|min:6'
    ];
    
    /**
     * Convert the password to hash value before saving
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * (1:m relationship) with the roles table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get all users ordered by the given parameter and direction.
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param string  $order
     * @param string  $direction
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrder($query, $order, $direction = 'DESC')
    {
        return $query->orderBy($order, $direction);
    }
    
    /**
     * Check if the user has a given role
     * 
     * @param  string  $role 
     * @return boolean
     */
    public function checkIfUserIs($role)
    {
       return strtolower($this->roles->name) === strtolower($role);
    }
    
}
