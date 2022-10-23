<?php

namespace App\Http\Controllers\AccountPayables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Actions\AccountPayables\AccountPayableDeleteAction;

class AccountPayableDeleteController extends Controller
{
    protected $action;

    /**
     * Create new controller instance
     *
     * @return void
     */
    
    public function __construct(AccountPayableDeleteAction $action)
    {
    	$this->action = $action;
    }

    /**
     * Handle the incoming request
     *
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    
    public function __invoke(Request $request, $id)
    {
    	$user = $this->action->execute($id);

    	return response()->json([
    		'message' => 'Update success'
    	]);
    }
}
