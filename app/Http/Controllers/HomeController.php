<?php

namespace App\Http\Controllers;

//use App\Events\SendMail;
use App\Events\SendMail;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        return view('home');
//    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        event( new SendMail( 2 ) );
//        Event::fire(new SendMail(2));
        return view( 'home' );
    }
}
