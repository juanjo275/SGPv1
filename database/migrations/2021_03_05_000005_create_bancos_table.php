<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancosTable extends Migration
{
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion')->nullable();
            $table->string('sucursal')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
