<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoComercialEstadoDocumentoComercialPivotTable extends Migration
{
    public function up()
    {
        Schema::create('documento_comercial_estado_documento_comercial', function (Blueprint $table) {
            $table->unsignedBigInteger('documento_comercial_id');
            $table->foreign('documento_comercial_id', 'documento_comercial_id_fk_3353229')->references('id')->on('documento_comercials')->onDelete('cascade');
            $table->unsignedBigInteger('estado_documento_comercial_id');
            $table->foreign('estado_documento_comercial_id', 'estado_documento_comercial_id_fk_3353229')->references('id')->on('estado_documento_comercials')->onDelete('cascade');
        });
    }
}
