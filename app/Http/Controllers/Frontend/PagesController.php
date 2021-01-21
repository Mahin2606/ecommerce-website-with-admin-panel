<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class PagesController extends Controller
{
    /**
     * Display the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->get();
        $featuredProducts = Product::where('featured_item', 1)->orderBy('id', 'desc')->get();
        return view('frontend.pages.home', compact('sliders', 'products', 'featuredProducts'));
    }

    // Display All Products
    public function allProducts()
    {
        $products = Product::orderBy('id', 'desc')->paginate(15);
        return view('frontend.pages.products.allProducts', compact('products'));
    }

    // Display Single Product
    public function productDetails($slug)
    {
        $value = Product::where('slug', $slug)->first();

        if (!is_null($value)) {
            return view('frontend.pages.products.details', compact('value')); 
        }
        else {
            return back();
        }
    }

    // Display Category Wise Products
    public function productCategory()
    {
        return view('frontend.pages.products.allProducts');
    }

    // Display Single Product of a Category
    public function showCategory($slug)
    {
        return view('frontend.pages.products.details');
    }

    public function login()
    {
        return view('frontend.pages.login');
    }

    public function registration()
    {
        return view('frontend.pages.registration');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
