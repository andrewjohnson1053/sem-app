<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fixtures', function (Blueprint $table) {
            $table->foreign('draw_id')
            ->references('id')
            ->on('draws')
            ->cascadeOnDelete();

            $table->foreign('group_id')
            ->references('id')
            ->on('groups')
            ->cascadeOnDelete();

            $table->foreign('first_participant_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table->foreign('second_participant_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table->foreign('winner_id')
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
        Schema::table('matches', function (Blueprint $table) {
            //
        });
    }
}
