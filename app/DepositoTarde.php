<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepositoTarde extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod_local',
        'mes_periodo',
        'ano_periodo',
        'dia_cierre',
        'fecha_cierre_dia',
        'fecha_cuadratura_cierre_dia',
        'dia_op_banc',
        'fecha_op_bancaria',
        'dif_min',
        'cant_dias',
        'moneda',
        'monto_deposito',
        'num_operacion',
        'usuario',
        'mon_tot_perdido',
        'estado_cuadratura',
        'llave_dif',
    ];
}
