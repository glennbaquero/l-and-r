<?php

namespace App\Http\Controllers\Faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Faqs\FaqStoreRequest;

use App\Actions\Faqs\FaqCreateOrUpdateAction;
use Session;

class FaqCreateController extends Controller
{
    protected $action;

    /**
     * Create new controller instance
     *
     * @return void
     */
    
    public function __construct(FaqCreateOrUpdateAction $action)
    {
    	$this->action = $action;
    }

    /**
     * Handle the incoming request
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    
    public function __invoke(FaqStoreRequest $request)
    {
    	$faq = $this->action->execute($request);
        Session::flash('success', 'FAQ successfully created!');
        return redirect()->route('faq.show', $faq->id);
    }
}
