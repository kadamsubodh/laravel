<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=product::with('category')->paginate(2);
        return view('product.productHome',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view("product.createProduct");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename="noimages.jpeg";
        if($request->hasFile('file'))
        {

            $filename=$request->file->getClientOriginalName();
            $request->file->storeAs('public/uploads', $filename);
        }

       $product= new product();
       $product->category_id=$request->select;
       $product->product_name=$request->productName;
        $product->product_price=$request->productPrice;
         $product->product_img=$filename;
         $product->save();
         return redirect('product');
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
         $products=product::with('category')->find($id);
         return view("product.editProduct", compact('products'));
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
        $filename=Product::find($id)->product_img;
        if($request->hasFile('file'))
        {

            $filename=$request->file->getClientOriginalName();
            $request->file->storeAs('public/uploads', $filename);
        }
        $product=product::find($id);
        $product->category_id=$request->select;
       $product->product_name=$request->productName;
        $product->product_price=$request->productPrice;
         $product->product_img=$filename;
         $product->save();
         return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $deleteProduct=product::find($id);
        $deleteProduct->delete();
        return redirect('product');
    }
     public function deleteAllProduct(Request $request)
    {
       $products= $request->input('check_list');
       foreach($products as $product)
       {
            $prod= product::find($product);
        $prod->delete();
       }
        return redirect('product');
    }
}
