<?php

namespace App\Http\Controllers\admin\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class classesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application Class.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.classes.classes');
    }
}
