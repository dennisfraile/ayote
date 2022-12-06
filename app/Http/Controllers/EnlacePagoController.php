<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnlacePagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $token = getToken('f78c7fe4-9989-4e7a-a2b8-ee24cf8857c0','6a0cf79a-dc0f-41dd-b1e5-ede29de67509');
        $result = getDataApi('https://api.wompi.sv/EnlacePago',$token);
        return view('enlace',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $token = getToken('f78c7fe4-9989-4e7a-a2b8-ee24cf8857c0','6a0cf79a-dc0f-41dd-b1e5-ede29de67509');
        $result = getDataApi('https://api.wompi.sv/EnlacePago',$token);
        return view('enlaces.create', compact('result'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'producto' =>'required',
            'aplicativo'=>'required',
        ]);
        $client = new \GuzzleHttp\Client();
        $enlace = $client->post('https://api.wompi.sv/EnlacePago',[
            'idAplicativo'=>$request->idAplicativo,
            'nombreProducto'=>$request->producto,
            'nombreEnlace'=>$request->name,
            'monto'=>$request->monto,
        ]);
        $enlace->send;
        return redirect()->route('enlacepago.index')->with('info', 'El enlace:' .$request->name.'se a creado con exito');
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
    }
}
