<?php

namespace App\Http\Controllers;

use App\Category;
use App\Design;
use App\Http\Requests\LiveDesignRequest;
use Illuminate\Http\Request;

class LiveDesignController extends Controller
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
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $design = Design::with(['categories', 'tags'])->where('slug', $slug)->firstOrFail();

        $similar = Design::order('RAND()')
                    ->where('categories_id', $design->categories_id)
                    ->where('id', '!=', $design->id)->active()
                    ->limit(12)->get();

        return view('live.details', compact('design', 'similar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = (new Category)->getAsPluckedData('name');

        return view('live.submit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Http\Requests  $request
     * @return Response
     */
    public function store(LiveDesignRequest $request)
    {
    	request()->merge(['status' => 0]);

        Design::create(request()->all());

        return back()->with('form_success', 'The item has been successfully submitted.');
    }
}
