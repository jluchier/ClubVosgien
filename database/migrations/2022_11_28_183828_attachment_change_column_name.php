<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttachmentChangeColumnName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('attachage_type', 'attachable_type');
            $table->renameColumn('attachage_id', 'attachable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attachements');
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->morphs('attachable');
            $table->timestamps();
        });
    }
}
