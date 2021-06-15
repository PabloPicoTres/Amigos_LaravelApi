<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\friend;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){ //GET api/friend
        //return response()->json(friend::all(), 200);
        $amigos = friend::all();
        foreach($amigos as $amigo){
            $amigo->llamadas;
        }
            
            
        return response()->json($amigos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){//POST api/friend + datos JSON
        try{
            $obj = friend::create($request->all());
            return response()->json(["id"=>$obj->id], 201);
        }catch(\Exception $e){
             return response()->json(["id"=>$e], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){//GET api/friend/id
        $amigo = friend::find($id);
        if($amigo != null){
            $llamadas = $amigo->llamadas;
        }
        return response()->json($amigo, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {  //PUT api/friend/id
        try{
            $amigo = friend::find($id);
            $resultado = $amigo->update($request->all());
            return response()->json(["resultado"=>$resultado], 200);
        }catch(\Exception $e){
            return response()->json(["resultado"=>false], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){//DELETE api/friend/id
        try{
            $resultado = friend::destroy($id);
        }catch(\Exception $e){
            $resultado = -1;
        }
    }
}
