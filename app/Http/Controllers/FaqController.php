<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\FaqCollection;
use App\Http\Fetch\FaqFetch;

use App\Models\Faq;

class FaqController extends Controller
{    
	protected $fetch;

    /**
     * Create new controller instance
     * 
     * @return void
     */
    public function __construct(FaqFetch $fetch)
    {
        $this->middleware('App\Http\Middleware\FaqMiddleware');
        $this->fetch = $fetch;
    }

    /**
     * Show users index page
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.faq.index', [
            'headers' => FaqCollection::$headers,
            'searches' => FaqCollection::$searches,
        ]);
    }

    /**
     * Fetch all users
     * 
     * @return Illuminate\Http\Response
     */
    public function fetch()
    {
        return new FaqCollection($this->fetch->execute(request()->input()));
    }

    /**
     * Show users create page
     * 
     * @return Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.faq.create', [
            //
        ]);
    }

    /**
     * Show groups view page
     * 
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::withTrashed()->findOrFail($id);

        return view('pages.faq.show', [
            'faq' => $faq,
        ]);
    }

}
