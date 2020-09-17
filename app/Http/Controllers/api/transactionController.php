<?php

namespace App\Http\Controllers\api;

use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Transaction  as TransactionResource;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json(TransactionResource::collection($transactions));
    
        //
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
        // $this->validate($request, [
        //     'name' => 'required',
        //     'start_date' => 'required|date',
        //     'end_date' => 'required|date',
        //     'user_id' => 'required|integer',
    
        // ]);

        $transaction = new Transaction();
        $transaction->user_id = $request->user_id;
        $transaction->product_id = $request->product_id;
        $transaction->supplier_id = $request->supplier_id;
        $transaction->month_id = $request->month_id;
        $transaction->date = $request->date;
        $transaction->quantity = $request->quantity;
        $transaction->price = $request->price;
      

        if ($transaction->save()) {
            return response()->json([
                'success' => true,
                'transaction' => $transaction
            ],201);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, transaction could not be added'
            ], 500);
        }
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

        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, transaction with id ' . $id . ' cannot be found'
            ], 400);
        }
        return $transaction;
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
        $transaction = Transaction::find($id);
        if (is_null($transaction)){
            return response()->json("transaction you want to update is not exist " , 404);
        }
        $transaction->update($request->all());

        return response()->json(
            [   'success' => true,
                'message' => 'transaction updated',
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
        $transaction = Transaction::find($id);

        if (is_null($transaction)){
            return response()->json("not found" , 404);
        }
        $transaction->delete();
        return response()->json("item is deleted " , 200);
        //
    }


     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function transactionsByMonth($id)
    {
        //
        $transactions= Transaction::where('month_id',$id)->get();
        // dd($transactions);

        if (!$transactions) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, transactions for billing month  id ' . $id . ' cannot be found'
            ], 400)
            ;
        }
        return response()->json(TransactionResource::collection($transactions));
    

    }
}
