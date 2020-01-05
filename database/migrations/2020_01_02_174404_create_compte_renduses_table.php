<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompteRendusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compte_renduses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string("title");
            $table->text("abstract");
            $table->string("compteRendu");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compte_renduses');
    }
}
