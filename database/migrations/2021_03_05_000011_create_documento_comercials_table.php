<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoComercialsTable extends Migration
{
    public function up()
    {
        Schema::create('documento_comercials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('monto', 15, 2)->nullable();
            $table->date('fecha')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
