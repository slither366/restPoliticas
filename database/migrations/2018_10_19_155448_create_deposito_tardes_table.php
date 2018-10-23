<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositoTardesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposito_tardes', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cod_local',3);
            $table->char('mes_periodo',2);
            $table->char('ano_periodo',4);
            $table->string('dia_cierre',9);
            $table->dateTime('fecha_cierre_dia');
            $table->dateTime('fecha_cuadratura_cierre_dia');
            $table->string('dia_op_banc',9);
            $table->dateTime('fecha_op_bancaria');
            $table->decimal('dif_min',8,2);
            $table->string('cant_dias',16);
            $table->string('moneda',5);
            $table->decimal('monto_deposito',8,2);
            $table->string('num_operacion',15);
            $table->string('usuario',15);
            $table->decimal('mon_tot_perdido',9,3);
            $table->char('estado_cuadratura',1);
            $table->string('llave_dif',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposito_tardes');
    }
}
