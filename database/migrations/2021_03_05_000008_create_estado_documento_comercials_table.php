<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoDocumentoComercialsTable extends Migration
{
    public function up()
    {
        Schema::create('estado_documento_comercials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
