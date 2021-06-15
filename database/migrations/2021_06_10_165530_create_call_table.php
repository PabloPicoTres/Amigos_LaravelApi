<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * Id, IdAmigo, FechaLlamada
     */
    public function up()
    {
        Schema::create('call', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idAmigo')->unsigned();
            $table->string('fecha_llamada', 12);
            $table->timestamps();
            $table->foreign('idAmigo')->references('id')->on('friend')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('call');
    }
}
