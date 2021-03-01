<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('tournament_id')
            ->references('id')
            ->on('tournaments')
            ->cascadeOnDelete();

            $table->foreign('sports_id')
            ->references('id')
            ->on('sports')
            ->cascadeOnDelete();
        });

        Schema::table('event_coordinators', function (Blueprint $table) {
            $table->foreign('event_id')
            ->references('id')
            ->on('events')
            ->cascadeOnDelete();

            $table->foreign('coordinator_id')
            ->references('id')
            ->on('users')
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
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
}
