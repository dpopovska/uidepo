<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    /**
     * Scope a query to order all data in table by the given parameter.
     *
	 * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param string  $order
     * @param string  $direction
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrder($query, $order, $direction = 'DESC')
    {
        if($order === 'RAND()') 
            return $query->orderByRaw($order);

        return $query->orderBy($order, $direction);
    }
	
	/**
     * Scope a query to search for the given value in the given column
     *
     * @param \Illuminate\Database\Eloquent\Builder  $query
     * @param string  $column
     * @param mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLike($query, $column, $value)
    {
        return $query->where($column, 'LIKE', "%$value%");
    }

    /**
    * (Pluck data) Get id together with the specified column
    * 
	* @param string  $column
    */
    public function getAsPluckedData($column)
    {
        return self::pluck($column, 'id');
    }
}
