<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttachmentUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('attachements');
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->morphs('attachable');
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
        Schema::dropIfExists('attachments');
        Schema::create('attachements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('attachage_type');
            $table->integer('attachage_id')->unsigned();
            $table->timestamps();
        });
    }
}
