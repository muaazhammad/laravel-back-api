<?php

namespace App\Http\Controllers\api;

use App\Month;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class monthsController extends Controller
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
        $months = Month::where('user_id',$user->id)->get();
        return response()->json($months);
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
        $this->validate($request, [
            'name' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'user_id' => 'required|integer',
        ]);

        $month = new Month();
        $month->name = $request->name;
        $month->start_date = $request->start_date;
        $month->end_date = $request->end_date;
        $month->user_id = $request->user_id;

        if ($month->save()) {
            return response()->json([
                'success' => true,
                'product' => $month
            ],201);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, Month could not be added'
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
        $month = Month::find($id);

        if (!$month) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, month with id ' . $id . ' cannot be found'
            ], 400);
        }
        return $month;
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
        $month = Month::find($id);
        if (is_null($month)){
            return response()->json("month you want to update is not exist " , 404);
        }
        $month->update($request->all());

        return response()->json(
            [   'success' => true,
                'message' => 'month updated',
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
        $month = Month::find($id);

        if (is_null($month)){
            return response()->json("not found" , 404);
        }
        $month->delete();
        return response()->json("item is deleted " , 200);
        //
    }
}
