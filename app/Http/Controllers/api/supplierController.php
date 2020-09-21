<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Supplier;
use Illuminate\Http\Request;

class supplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = auth()->user();
        $suppliers = Supplier::where('user_id',$user->id)->get();
        //  $suppliers = Supplier::all();

        return response()->json($suppliers);
        

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|integer',
            'user_id' => 'required|integer',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->user_id = $request->user_id;
        $supplier->phone_number = $request->phone_number;

        if ($supplier->save()) {
            return response()->json([
                'success' => true,
                'product' => $supplier
            ],201);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product could not be added'
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product with id ' . $id . ' cannot be found'
            ], 400);
        }
        return $supplier;
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

        $supplier = Supplier::find($id);
        if (is_null($supplier)){
            return response()->json("supplier you want to update is not exist " , 404);
        }
        $supplier->update($request->all());

        return response()->json(
            [   'success' => true,
                'message' => 'supplier updated',
            ] , 200);
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
        $supplier = Supplier::find($id);

        if (is_null($supplier)){
            return response()->json("not found" , 404);
        }
        $supplier->delete();
        return response()->json("item is deleted " , 200);
    }

    public function totalSuppliers()
    {
        $user = auth()->user();
        
        $total= Supplier::where('user_id',$user->id)->count('name');
        // dd($transactions);

        if (!$total) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, no product found'
            ], 400)
            ;
        }
        return $total;
    

    }
}
