<?php

namespace App\Http\Controllers;

use App\Actions\Like\LikeDeleteAction;
use App\Actions\Like\LikeStoreAction;
use App\Http\Requests\LikeDeleteRequest;
use App\Http\Requests\LikeStoreRequest;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LikeStoreRequest $request, LikeStoreAction $action)
    {
        $action->exec($request->validated());

        return response()->json(['success' => true]);
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
    public function destroy($identify, LikeDeleteRequest $request, LikeDeleteAction $action)
    {
        $action->exec($identify);

        return response()->json(['success' => true]);
    }
}
