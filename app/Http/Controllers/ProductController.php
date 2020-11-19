<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::All();

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'          => 'required|string|max:100',
                'default_price' => "required|regex:/^\d*(.\d{1,2})?$/"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error'      => true,
                'errorList'  => $validator->errors()
            ], 422);
        }

        $product = new Product();

        $product->name =  $request->name;
        $product->default_price =  $request->default_price;

        $verify = $product->save();

        if ($verify) {
            return response()->json([
                'error'  => false,
                'message'   => "le produit est créé",
                'product' => $product
            ], 200);
        } else {
            return response()->json([
                'error'  => true,
                'errorList'   => 'un problème est survenu dans la création',
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id'            => 'required|exists:App\Models\Product,id',
                'name'          => 'required|string|max:100',
                'default_price' => "required|regex:/^\d*(.\d{1,2})?$/"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error'      => true,
                'errorList'  => $validator->errors()
            ], 422);
        }

        $product = Product::find($request->id);

        $product->name =  $request->name;
        $product->default_price =  $request->default_price;

        $verify = $product->save();

        if ($verify) {
            return response()->json([
                'error'  => false,
                'message'   => "le produit est modifié",
                'product' => New ProductResource($product)
            ], 200);
        } else {
            return response()->json([
                'error'  => true,
                'errorList'   => 'un problème est survenu dans la modification',
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id'          => 'required|exists:App\Models\Product,id',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error'      => true,
                'errorList'  => $validator->errors()
            ], 422);
        }

        $product = Product::find($request->id);

        $verify = $product->delete();

        if ($verify) {
            return response()->json([
                'error'  => false,
                'message'   => "le produit est supprimé"
            ], 200);
        } else {
            return response()->json([
                'error'  => true,
                'errorList'   => 'un problème est survenu dans la suppression',
            ], 422);
        }
    }
}
