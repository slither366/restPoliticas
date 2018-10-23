<?php

namespace App\Http\Controllers\DepositoTarde;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\DepositoTarde;
use DB;

class DepositoTardeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depositos = DepositoTarde::all();

        return $this->showAll($depositos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'cod_local' => 'required|size:3',
            'mes_periodo' => 'required|digits:2',
            'ano_periodo' => 'required|digits:4',
            'dia_cierre' => 'required',
            'fecha_cierre_dia' => 'required',
            'dia_op_banc' => 'required',
            'fecha_op_bancaria' => 'required',
            'dif_min' => 'required',//numeric
            'cant_dias' => 'required',
            'moneda' => 'required',
            'monto_deposito' => 'required',//numeric
            'num_operacion' => 'required',//numeric
            'usuario' => 'required',
        ];

        $this->validate($request, $rules);
        $campos = $request->all();
        $depositos = DepositoTarde::create($campos);

        //return response()->json(['data' => $usuario], 201);
        return $this->showOne($depositos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $depositos = DepositoTarde::findOrFail($id);

        return $this->showOne($depositos);
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
        $depositos = DepositoTarde::findOrFail($id);

        $depositos->delete();
    }

    public function getLlaveDif($llave)
    {
        //$depositos = DepositoTarde::findOrFail($id);
        $depositos = DB::table('deposito_tardes')->where('llave_dif','=',$llave)->get();

        if($depositos == '[]'){
            return 'false';
        }
        else{
            return 'true';
        }

    }    
}
