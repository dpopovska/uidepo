<?php

namespace App\Http\Controllers;

use App\Category;
use App\Design;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of table: Designs per category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($category)
    {
    	$category = Category::where('link', $category)->active()->firstOrFail();

    	$designs = Design::where('categories_id', $category->id)->active()->order('created_at')->paginate(12);

        return view('live.category_items', compact('category', 'designs'));
    }
}
