<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('title', 'desc')->get();
        return view('backend.pages.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max: 255',
        ],
        [
            'title.required' => 'Please insert the product name',
        ]);

        $product = new Product();
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->short_desc = $request->short_desc;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->product_type = $request->product_type;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->quantity = $request->quantity;
        $product->sku_code = $request->sku_code;
        $product->featured_item = $request->featured_item;
        $product->status = $request->status;
        $product->tags = trim($request->tags);

        if ($request->image) {
            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('Backend/img/product/' . $img);

            Image::make($image)->save($location);

            $product->image = $img;
        }

        $product->save();

        return redirect()->route('product.manage');
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
        $product = Product::find($id);

        if (!is_null($product)) {
            return view('backend.pages.product.edit', compact('product'));
        }
        else {
            return redirect()->route('product.manage');
        }
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
        $request->validate([
            'title' => 'required|max: 255',
        ],
        [
            'title.required' => 'Please insert the product name',
        ]);

        $product = Product::find($id);
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->short_desc = $request->short_desc;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->product_type = $request->product_type;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price;
        $product->quantity = $request->quantity;
        $product->sku_code = $request->sku_code;
        $product->featured_item = $request->featured_item;
        $product->status = $request->status;
        $product->tags = trim($request->tags);

        if (!is_null($request->image)) {
            // Delete existing image if any
            if (File::exists('Backend/img/product/' . $product->image)) {
                File::delete('Backend/img/product/' . $product->image);
            }

            $image = $request->file('image');
            $img = rand() . '.' . $image->getClientOriginalExtension();
            $location = public_path('Backend/img/product/' . $img);

            Image::make($image)->save($location);

            $product->image = $img;
        }

        $product->save();

        return redirect()->route('product.manage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!is_null($product)) {
            // Delete existing image if any
            if (File::exists('Backend/img/product/' . $product->image)) {
                File::delete('Backend/img/product/' . $product->image);
            }

            $product->delete();

            return redirect()->route('product.manage');
        }
        else {
            return redirect()->route('product.manage');
        }
    }
}
