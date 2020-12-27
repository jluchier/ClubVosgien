<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::table("categories")->insert([
        ["name" => "Comité"],
        ["name" => "Formations"],
        ["name" => "Adhésions"],
        ["name" => "Partenaires"],
        ["name" => "Avantages"],
      ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
