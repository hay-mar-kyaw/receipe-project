<?php

namespace App\Http\Controllers;

use App\Models\Receipe;
use Exception;
use Illuminate\Http\Request;

class ReceipeController extends Controller
{
         /**
         * get all receipes and filter by category
         * GET- /api/receipes
         * @param category
         */
    public function index()
    {

        try{

            return Receipe::filter(request(['category']))->paginate(6);

        }catch(Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'status'=>500
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Get a receipe.
     * GET - api/receipes/:id
     */
    public function show($id)
    {
        try{
                $receipe=Receipe::find($id);
                if(!$receipe){
                    return response()->json([
                        'message'=>'receipe not found',
                        'status'=>404
                    ],404);
                }
                return $receipe;


        }catch(Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'status'=>500
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipe $receipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receipe $receipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receipe $receipe)
    {
        //
    }
}
