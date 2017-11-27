<?php

namespace App\Http\Controllers;

use App\Design;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a list of searched designs/items
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$designs = Design::like('title', request('term'))->active()->order('created_at')->paginate(12);

        return view('live.search', compact('designs'));
    }
}
