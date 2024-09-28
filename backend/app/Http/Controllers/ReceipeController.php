<?php

namespace App\Http\Controllers;

use App\Models\Receipe;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
     * POST - api/receipes
     * @param title, description, category_id, photo
     */
    public function store()
    {
        try{

            //validate
            $validator=Validator::make(request()->all(),[
                'title'=>'required',
                'description'=>'required',
                'category_id'=>['required',Rule::exists('categories','id')],
                'image'=>'required'
            ]);
            // if validation fail

            if($validator->fails()){
                $flatteredErrors = collect($validator->errors())->flatMap(function ($e, $field){
                    return [$field => $e[0]];
                });
                return response()->json([
                    'errors'=>$flatteredErrors,
                    'status'=>400
                ], 400);
            }

            //if validation pass
            $receipe=new Receipe();
            $receipe->title=request('title');
            $receipe->description=request('description');
            $receipe->image=request('image');
            $receipe->category_id=request('category_id');
            $receipe->save();

            return response()->json($receipe, 201);
        }catch(Exception $e){
            return response()->json([
                'message'=>$e->getMessage(),
                'status'=>500
            ], 500);
        }
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
    public function destroy($id)
    {
        try{
            $receipe=Receipe::find($id);
            if(!$receipe){
                return response()->json([
                    'message'=>'receipe not found',
                    'status'=>404
                ],404);
            }
            $receipe->delete();
            return $receipe;


            }catch(Exception $e){
                return response()->json([
                    'message'=>$e->getMessage(),
                    'status'=>500
                ], 500);
            }
    }
}
