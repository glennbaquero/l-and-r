<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\QueryLike;
use Carbon\Carbon;

class TripTime extends Model
{
    use HasFactory, QueryLike;

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
    protected $appends = ['formatted_time', 'formatted_arrival_time', 'formatted_arrival_date', 'deleteUrl', 'new'];

    /**
     * TripTime belongs to Trip
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trip()
    {
        return $this->belongsTo(Trip::class)->withTrashed()->with('route');
    }

    /**
     * TripTime belongs to Trip
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function driver()
    {
        return $this->belongsTo(Driver::class)->withTrashed();
    }
    
    /**
     * TripTime belongs to bus
     * 
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id', 'id');
    }

    /**
     * append formatted time
     * 
     * @return string
     */
    public function getFormattedTimeAttribute()
    {
        return Carbon::parse($this->time)->format('h:i A');
    }

    /**
     * append formatted time
     * 
     * @return string
     */
    public function getFormattedArrivalTimeAttribute()
    {
        return Carbon::parse($this->arrival_time)->format('h:i A');
    }

    /**
     * append formatted arrival date
     * 
     * @return string
     */
    public function getFormattedArrivalDateAttribute()
    {
        $date = $this->arrival_date ?? $this->trip->date;
        return Carbon::parse($date)->format('m-d-Y');
    }

    /**
     * append delete url
     * 
     * @return string
     */
    public function getDeleteUrlAttribute()
    {
        return route('trip-time.destroy', $this->id);
    }

    /**
     * append new is false
     * 
     * @return string
     */
    public function getNewAttribute()
    {
        return false;
    }
}
