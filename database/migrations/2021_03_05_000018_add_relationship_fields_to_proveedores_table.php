<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProveedoresTable extends Migration
{
    public function up()
    {
        Schema::table('proveedores', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_3353183')->references('id')->on('users');
            $table->unsignedBigInteger('cuenta_bancaria_id')->nullable();
            $table->foreign('cuenta_bancaria_id', 'cuenta_bancaria_fk_3353192')->references('id')->on('cuenta_bancaria');
        });
    }
}
