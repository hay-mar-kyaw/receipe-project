<?php

namespace App\Http\Controllers;

use App\Models\Receipe;
use Exception;
use Illuminate\Http\Request;

class ReceipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{


            return Receipe::paginate(6);


        }catch(Exception $e){
            return [

                'message'=>$e->getMessage(),
                'status'=>404
            ];
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
     * Display the specified resource.
     */
    public function show(Receipe $receipe)
    {
        //
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
