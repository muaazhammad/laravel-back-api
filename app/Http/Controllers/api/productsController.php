<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Resources\Product  as ProductResource;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
    // * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user();
       
         $products = Product::where('user_id',$user->id)->get();
        // return response()->json($products);
        return response()->json (ProductResource::collection($products));           //using apiresource (single)

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|integer',
            'user_id' => 'required|integer',
            'supplier_id' => 'required|integer',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->user_id = $request->user_id;
        $product->supplier_id = $request->supplier_id;

        if ($product->save()) {
            return response()->json([
                'success' => true,
                'product' => $product
            ],201);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be added'
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    //  * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        //

        $product = Product::find($id);
        if (is_null($product)){
            return response()->json("product you want to update is not exist " , 404);
        }
        $product->update($request->all());

        return response()->json(
            [   'success' => true,
                'message' => 'product updated',
            ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        //
        $product = Product::find($id);

        if (is_null($product)){
            return response()->json("not found" , 404);
        }
        if (count($product->transactions)){
            return response()->json("can't delete a prodcut which has transaactions" , 422);
        }
        $product->delete();
        return response()->json("item is deleted " , 200);
    }
}

