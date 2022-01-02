<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Product Page';
        $productData = Products::all();
        return view('admin.product.table' , compact('title' , 'productData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Add product page';
        $category = Category::all();
        return view('admin.product.add' , compact('title' , 'category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Products $products)
    {
        $validate_data = $this->validate($request ,[
            'title'=>'required',
            'description' => 'required',
            'pic' => 'required',
            'price' => 'required',
            'count' => 'required',
            'category_id' => 'required',
        ]);
        $products->create([
            'title'=>$validate_data['title'],
            'description'=>$validate_data['description'],
            'pic'=>$validate_data['pic'],
            'price'=>$validate_data['price'],
            'count'=>$validate_data['count'],
            'category_id'=>$validate_data['category_id'],
        ]);

        return redirect('/dashboard/product');
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
    public function destroy(Products $products)
    {
        $products->delete();
        return back();
    }
}
