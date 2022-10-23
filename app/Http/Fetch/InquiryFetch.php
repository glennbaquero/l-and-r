<?php

namespace App\Http\Fetch;

use App\Models\ContactUs;

class InquiryFetch
{
    protected $item;

    /**
     * Create new fetch instance
     * 
     * @return void
     */
    public function __construct(ContactUs $item)
    {
        $this->item = $item;
    }

    /**
     * Handles querying of account payable model
     * 
     * @param array $params
     * @return mixed $item
     */
    public function execute($params)
    {
        $this->item = $this->item
                    ->whereLike('phone_number', $params['phone_number'])->whereLike('email', $params['email']);

        return $this->item->paginate(20);
    }
}