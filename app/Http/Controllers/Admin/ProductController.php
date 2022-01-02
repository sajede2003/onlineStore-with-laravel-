<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
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
        $productData = Product::all();
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
    public function store(Request $request , Product $product)
    {
        $validatedata = $this->validate($request ,[
            'title'=>'required',
            'description' => 'required',
            'pic' => 'required|mimes:jpg,png,jpeg|max:5048',
            'price' => 'required',
            'count' => 'required',
            'category_id' => 'required',
        ]);
        $newImageName = time() . '_' . $request->title . '.' .
            $request->pic->extension();
        $request->pic->move(public_path('images') , $newImageName);

        $product->create([
            'title'=>$validatedata['title'],
            'description'=>$validatedata['description'],
            'price'=>$validatedata['price'],
            'count'=>$validatedata['count'],
            'pic'=> $newImageName,
            'category_id'=>$validatedata['category_id'],
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
    public function edit(Product $product)
    {
        $title = 'Edit product';
        $category = Category::all();
        return view('admin.product.edit' , compact('title' , 'product' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validate_data = $this->validate($request , [
            'title'=>'required',
            'description' => 'required',
            'pic' => 'required',
            'price' => 'required',
            'count' => 'required',
            'category_id' => 'required',
        ]);

        $product->update($validate_data);
        return redirect('dashboard/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
