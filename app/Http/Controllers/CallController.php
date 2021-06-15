<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\call;
use App\Models\friend;
use DB;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){ //GET api/call
        return response()->json(call::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     
    public function store(Request $request) {  //POST api/call + datos JSON
        try{
            $obj = call::create($request->all());
            return response()->json(["id"=>$obj->id], 201);
        }catch(\Exception $e){
             return response()->json(["id"=>0], 200);
        }
    }*/
    
    
    public function store(Request $request) {  //POST api/call + datos JSON
        //$amigos = friend::all();
        
        $amigo = DB::table('friend')
                ->where('numero', '=', $request->numero)
                ->first();
        if($amigo != null){
            
            $obj = call::create([
                'idAmigo' => $amigo->id,
                'fecha_llamada' => $request->fecha_llamada
            ]);
            
            return response()->json($obj->id, 200);
        } else {
            return response()->json("not a friend", 500);
        }
        
        /*foreach($amigos as $amigo){
            
            
            
            if($amigo->numero == $request->numero){
                
                try{
                    $obj = call::create([$amigo->id,$request->fecha_llamada]);
                    return response()->json(["id"=>$obj->id], 201);
                }catch(\Exception $e){
                     return response()->json(["id"=>0], 200);
                }
                
            }
        }*/
        
        
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {  //GET api/call/id
        $call = call::find($id);
        if($call != null){
            $amigo = $call->amigo;
        }
        return response()->json($call, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) { //PUT api/call/id
        try{
            $call = ordenador::find($id);
            $resultado = $call->update($request->all());
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
    public function destroy($id) { //DELETE api/call/id
        try{
            $resultado = ordenador::destroy($id);
        }catch(\Exception $e){
            $resultado = -1;
        }
    }
}
