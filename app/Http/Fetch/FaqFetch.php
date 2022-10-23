<?php

namespace App\Http\Fetch;

use App\Models\Faq;
use App\Models\User;
use App\Models\Passenger;
use App\Models\Ticket;

class FaqFetch
{
    protected $faq;

    /**
     * Create new fetch instance
     * 
     * @return void
     */
    public function __construct(Faq $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Handles querying of faq model
     * 
     * @param array $params
     * @return mixed $faq
     */
    public function execute($params)
    {
        $this->faq = $this->faq
                    ->whereLike('title', $params['title'])
                    ->orWhereLike('section', $params['section']);;

        return $this->faq->paginate(20);
    }
}