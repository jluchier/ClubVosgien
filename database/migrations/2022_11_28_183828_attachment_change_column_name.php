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
        Schema::table('attachments', function (Blueprint $table) {
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
        Schema::table('attachments', function (Blueprint $table) {
            $table->renameColumn('attachable_type', 'attachage_type');
            $table->renameColumn('attachable_id', 'attachage_id');
        });
    }
}
