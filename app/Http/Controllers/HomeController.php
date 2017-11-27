<?php

namespace App\Http\Controllers;

use App\Design;
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
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $random = Design::order('RAND()')->active()->limit(4)->get();

        $recent = Design::order('created_at')->active()->limit(12)->get();

        $popular = Design::order('views')->active()->limit(12)->get();

        return view('live.home', compact('random', 'recent', 'popular'));
    }

    /**
     * Load more designs on button click (home page)
     * 
     * @return \Illuminate\Http\Response
     */
    public function loadMore()
    {
        $items = Design::with('categories')->active()->order(request('order'))->paginate(12);

        return $items;   
    }
}
