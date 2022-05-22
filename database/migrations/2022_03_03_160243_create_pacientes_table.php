<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->String('names', 50);
            $table->String('lastnames', 50);
            $table->String('rut', 20);
            $table->String('birthday', 20);
            $table->String('consulta', 20);
            $table->String('telephone', 20);
            $table->String('email', 50);
            $table->text('anamnesis');
            $table->text('observacion');
            $table->String('foto', 50)->default(NULL);
            $table->String('anexo', 50)->default(NULL);
            $table->unsignedBigInteger('user_id');
            $table->boolean('confirmed')->default(0);
            $table->unsignedBigInteger('asignado');




            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('asignado')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
