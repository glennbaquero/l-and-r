<?php

namespace App\Http\Fetch;

use App\Models\Career;

class ApplicantFetch
{
    protected $item;

    /**
     * Create new fetch instance
     * 
     * @return void
     */
    public function __construct(Career $item)
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
                    ->whereLike('position', $params['position'])->whereLike('email', $params['email']);

        return $this->item->paginate(20);
    }
}