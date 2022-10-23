<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Carbon\Carbon;

class ApplicantCollection extends ResourceCollection
{
    /**
     * Fields that are used for table headers
     * 
     * @var array 
     */
    public static $headers = [
       'Name', 'Position', 'Email', 'Phone Number','Submitted Date', 'Actions'
    ];

    /**
     * Fields that are used for searching
     * 
     * @var array
     */
    public static $searches = [
        'position', 'email'
    ];

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function($item) {
            return [
                'id' => $item->id,
                'name' => $item->first_name. ' '.$item->last_name ,
                'position' => $item->position,
                'email' => $item->email,
                'phone_number' => $item->phone_number,
                'created_at' => Carbon::parse($item->created_at)->format('Y-m-d'),
                'showUrl' => route('applicant.show', $item->id),
                'deleteUrl' => route('applicant.destroy', $item->id),
            ];
        });
    }
}
