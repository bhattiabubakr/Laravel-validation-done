<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Product as ProductResource;
use App\Models\Product;
use App\Http\Requests\SaveProductRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProductRequest $request)
    {
        $product = new Product;
        $product->id = request('id');
        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->save();
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
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
        $data = array(
            'id'=> $request-> input('id'),
            'name'=>$request-> input('name'),
            'description'=>$request->input('description'),
            'price'=>$request->input('price')
        );
        Product::where('id', $id)->update($data);
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
        //return new PetResource($pet);
        return response('deleted'.' '.$product->id);
    }
    
}