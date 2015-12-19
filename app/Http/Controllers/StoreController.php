<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $pFeatured = Product::featured()->get();
        $pRecommended = Product::recommend()->get();

        return view('store.index', compact('categories','pFeatured','pRecommended'));
    }

    public function category($id)
    {
        $category = Category::find($id);
        $categories = Category::all();

        return view('store.categories', compact('categories','category'));
    }
}
