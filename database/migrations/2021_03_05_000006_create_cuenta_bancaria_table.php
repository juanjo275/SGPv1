<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaBancariaTable extends Migration
{
    public function up()
    {
        Schema::create('cuenta_bancaria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cbu')->nullable();
            $table->string('nro_cuenta')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
