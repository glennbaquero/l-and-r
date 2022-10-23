<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faq;
use Session;

class FaqController extends Controller
{
    public function index() 
    {
        $faqs = Faq::get()->groupby('section');
        return view('public.pages.faq', [
            'faqs' => $faqs
        ]);
    }
}
