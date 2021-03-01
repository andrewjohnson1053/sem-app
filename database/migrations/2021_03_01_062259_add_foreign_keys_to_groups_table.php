<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->foreign('event_id')
            ->references('id')
            ->on('events')
            ->cascadeOnDelete();

            $table->foreign('draw_id')
            ->references('id')
            ->on('draws')
            ->cascadeOnDelete();
        });

    
        Schema::table('group_participants', function (Blueprint $table) {
            $table->foreign('group_id')
            ->references('id')
            ->on('groups')
            ->cascadeOnDelete();

            $table->foreign('participant_id')
            ->references('id')
            ->on('participants')
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            //
        });
    }
}
