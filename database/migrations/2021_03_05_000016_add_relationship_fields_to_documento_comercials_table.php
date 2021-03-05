<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDocumentoComercialsTable extends Migration
{
    public function up()
    {
        Schema::table('documento_comercials', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->foreign('created_by_id', 'created_by_fk_3353191')->references('id')->on('users');
            $table->unsignedBigInteger('tipo_documento_comercial_id')->nullable();
            $table->foreign('tipo_documento_comercial_id', 'tipo_documento_comercial_fk_3353228')->references('id')->on('tipo_documento_comercials');
        });
    }
}
