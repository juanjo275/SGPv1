<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCuentaBancariaTable extends Migration
{
    public function up()
    {
        Schema::table('cuenta_bancaria', function (Blueprint $table) {
            $table->unsignedBigInteger('banco_id')->nullable();
            $table->foreign('banco_id', 'banco_fk_3353215')->references('id')->on('bancos');
            $table->unsignedBigInteger('tipo_cuenta_id')->nullable();
            $table->foreign('tipo_cuenta_id', 'tipo_cuenta_fk_3353216')->references('id')->on('tipo_cuenta_bancaria');
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_3353217')->references('id')->on('users');
        });
    }
}
