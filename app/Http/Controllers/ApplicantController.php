<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\ApplicantCollection;
use App\Http\Fetch\ApplicantFetch;

use App\Models\Career;

use DB;

class ApplicantController extends Controller
{    
	protected $fetch;

    /**
     * Create new controller instance
     * 
     * @return void
     */
    public function __construct(ApplicantFetch $fetch)
    {
        $this->middleware('App\Http\Middleware\ApplicantMiddleware');
        $this->fetch = $fetch;
    }

    /**
     * Show users index page
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.careers.index', [
            'headers' => ApplicantCollection::$headers,
            'searches' => ApplicantCollection::$searches,
        ]);
    }

    /**
     * Fetch all users
     * 
     * @return Illuminate\Http\Response
     */
    public function fetch()
    {
        return new ApplicantCollection($this->fetch->execute(request()->input()));
    }
    /**
     * Show groups view page
     * 
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Career::withTrashed()->findOrFail($id);
        return view('pages.careers.show', [
            'item' => $item,
        ]);
    }


    /**
     * Handles archiving of applicant
     */
    
    public function delete($id)
    {

        DB::beginTransaction();
            $item = Career::withTrashed()->findOrFail($id);
            $item->delete();
        DB::commit();


        return response()->json([
            'message' => 'Delete success'
        ]);
    }

}
