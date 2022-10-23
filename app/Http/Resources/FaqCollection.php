<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use Carbon\Carbon;

class FaqCollection extends ResourceCollection
{
    /**
     * Fields that are used for table headers
     * 
     * @var array 
     */
    public static $headers = [
       'ID', 'Title', 'Section', 'Actions'
    ];

    /**
     * Fields that are used for searching
     * 
     * @var array
     */
    public static $searches = [
        'title', 'section'
    ];

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function($faq) {
            return [
                'id' => $faq->id,
                'title' => $faq->title,
                'section' => $faq->section,
                'showUrl' => route('faq.show', $faq->id),
                'deleteUrl' => route('faq.destroy', $faq->id),
            ];
        });
    }
}
