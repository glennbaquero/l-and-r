<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Carbon\Carbon;

class InquiryCollection extends ResourceCollection
{
    /**
     * Fields that are used for table headers
     * 
     * @var array 
     */
    public static $headers = [
       'Name', 'Email', 'Phone Number', 'Submitted Date', 'Actions'
    ];

    /**
     * Fields that are used for searching
     * 
     * @var array
     */
    public static $searches = [
        'phone_number', 'email'
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
                'name' => $item->name ,
                'email' => $item->email,
                'phone_number' => $item->phone_number,
                'created_at' => Carbon::parse($item->created_at)->format('Y-m-d'),
                'showUrl' => route('inquiry.show', $item->id),
                'deleteUrl' => route('inquiry.destroy', $item->id),
            ];
        });
    }
}
