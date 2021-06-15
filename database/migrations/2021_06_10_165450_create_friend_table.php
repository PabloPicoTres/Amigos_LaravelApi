<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * 
     * Id, Nombre, Fecha de nacimiento (nullable), Teléfono.
     */
    public function up()
    {
        Schema::create('friend', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->string('fecha_nac', 12);
            $table->Integer('numero');
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
        Schema::dropIfExists('friend');
    }
}
