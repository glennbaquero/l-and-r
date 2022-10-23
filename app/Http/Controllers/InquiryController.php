<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\InquiryCollection;
use App\Http\Fetch\InquiryFetch;

use App\Models\ContactUs;

use DB;

class InquiryController extends Controller
{    
	protected $fetch;

    /**
     * Create new controller instance
     * 
     * @return void
     */
    public function __construct(InquiryFetch $fetch)
    {
        $this->middleware('App\Http\Middleware\InquiryMiddleware');
        $this->fetch = $fetch;
    }

    /**
     * Show users index page
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.inquiry.index', [
            'headers' => InquiryCollection::$headers,
            'searches' => InquiryCollection::$searches,
        ]);
    }

    /**
     * Fetch all users
     * 
     * @return Illuminate\Http\Response
     */
    public function fetch()
    {
        return new InquiryCollection($this->fetch->execute(request()->input()));
    }
    /**
     * Show groups view page
     * 
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = ContactUs::withTrashed()->findOrFail($id);
        return view('pages.inquiry.show', [
            'item' => $item,
        ]);
    }


    /**
     * Handles archiving of Inquiry
     */
    
    public function delete($id)
    {

        DB::beginTransaction();
            $item = ContactUs::withTrashed()->findOrFail($id);
            $item->delete();
        DB::commit();


        return response()->json([
            'message' => 'Delete success'
        ]);
    }

}
