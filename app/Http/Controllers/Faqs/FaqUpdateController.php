<?php

namespace App\Http\Controllers\Faqs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Faqs\FaqStoreRequest;

use App\Actions\Faqs\FaqCreateOrUpdateAction;
use Session;

class FaqUpdateController extends Controller
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
    
    public function __invoke(FaqStoreRequest $request, $id)
    {
    	$faq = $this->action->execute($request, $id);
        
        Session::flash('success', 'FAQ updated successfully!');

    	return redirect()->back();
    }
}
