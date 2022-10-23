<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\QueryLike;

class City extends Model
{
    use HasFactory, QueryLike, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Append additional attributes
     * 
     * @var array
     */
    protected $appends = ['city_with_state'];

    /**
     * City belongs to Price
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departure_prices()
    {
        return $this->hasMany(Price::class, 'departure_id', 'id');
    }

    /**
     * City belongs to Price
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function arrival_prices()
    {
        return $this->hasMany(Price::class, 'arrival_id', 'id');
    }

    /**
     * City belongs to Price
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function offices()
    {
        return $this->hasMany(Office::class, 'departure_city_id', 'id');
    }


    /**
     * Get name with state
     * 
     * @return string
     */
    public function getCityWithStateAttribute()
    {
        return $this->name.', '.$this->state;
    }
}
