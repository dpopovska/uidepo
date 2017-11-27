<?php

namespace App\Http\Controllers;

use App\Category;
use App\CustomFunctions;
use App\Design;
use App\Http\Requests\DesignRequest;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DesignController extends Controller
{
    private $mainmenu = 'block-live-pages';
    
    private $submenu  = 'design';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of table: Designs.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$designs = Design::order('created_at')->get();

        return view('designs.list', compact('designs'))->with(['mainmenu' => $this->mainmenu, 'submenu' => $this->submenu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = (new Category)->getAsPluckedData('name');

        $tags = (new Tag)->getAsPluckedData('name');

        return view('designs.create', compact('categories', 'tags'))
                ->with(['mainmenu' => $this->mainmenu, 'submenu' => $this->submenu]);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Http\Requests  $request
     * @param  \App\CustomFunctions  $cfunc
     * @return Response
     */
    public function store(DesignRequest $request, CustomFunctions $cfunc)
    {
        request()->merge([
            'slug' => str_slug(request('title')), 
            'users_id' => auth()->user()->id, 
            'full_name' => auth()->user()->name, 
            'email_address' => auth()->user()->email
        ]);

        $new = Design::create(request()->all());
    
        if(!is_null(request('tag_id')))
            $new->tags()->attach(request('tag_id'));

        $filenames = $cfunc->uploadFiles(request(), 'designs/'.$new->id.'/', [
            'featured_thumbnail', 'regular_thumbnail', 'preview_img', 'help_document']);

        $new->update($filenames);

        return redirect()->route('designs.index')->with('form_success', 'Design item has been successfully created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Design  $news
     * @return Response
     */
    public function edit(Design $design)
    {
    	$categories = (new Category)->getAsPluckedData('name');

        $tags = (new Tag)->getAsPluckedData('name');

        return view('designs.edit', compact(['design', 'categories', 'tags']))
                ->with(['mainmenu' => $this->mainmenu, 'submenu' => $this->submenu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests  $request
     * @param  \App\Design  $design
     * @param  \App\CustomFunctions  $cfunc
     * @return Response
     */
    public function update(DesignRequest $request, Design $design, CustomFunctions $cfunc)
    {
        $filenames = $cfunc->uploadFiles(request(), 'designs/'.$design->id.'/', [
            'featured_thumbnail', 'regular_thumbnail', 'preview_img', 'help_document']);

        $updates = array_merge(request()->all(), $filenames);

        $updates['preview_img'] = (isset($updates['preview_img'])) 
            ? array_merge($design->preview_img, $updates['preview_img']) 
            : $design->preview_img;

        $design->update($updates);

        if(isset($updates['tag_id']))
            $design->tags()->sync($updates['tag_id']);

        return redirect()->route('designs.index')->with('form_success', 'Design item has been successfully updated.');
    }

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
    public function destroy($id)
    {
    	$design = (new Design)->getDesignById($id);

        if(!is_null($design))
            Storage::deleteDirectory('designs/'.$design->id.'/');

        $design->tags()->detach();

        $design->delete();

        return redirect()->route('designs.index')->with('success', 'Selected design item has been successfully deleted.');
    }

}
