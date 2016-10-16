<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->session()->put('sander', 'man');

/*
        $request->session()->forget('sander');

        if ($request->session()->exists('sander')) {
            $sander = $request->session()->get('sander');

            return $request->session()->all();
            return ($sander) ? $sander : 'default';
        }

        return 'fail';
*/

        return view('home');
    }
}
