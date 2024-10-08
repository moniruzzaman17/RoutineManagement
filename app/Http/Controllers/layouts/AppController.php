<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request  =   $request;
    }

    public function index(){
    	return view('home');
    }

    public function adminIndex(){
        return view('welcome');
    }

    public function abort404(){
        return abort(404);
    }
}
