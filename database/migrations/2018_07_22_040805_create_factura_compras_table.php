<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_compras', function (Blueprint $table) {
            $table->increments('idfacturacompra');
            $table->integer('idproveedor')->unsigned();
            $table->foreign('idproveedor')
                 ->references('idproveedor')
                 ->on('proveedores')
                 ->onDelete('cascade');
            $table->string('numero', 50);
            $table->string('contrato', 100);
            $table->string('comprador', 100);
            $table->date('fecha');
            $table->string('documento');
            $table->string('contacto', 10);
            $table->string('telefono', 10);
            $table->softDeletes();
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
        Schema::dropIfExists('factura_compras');
    }
}
