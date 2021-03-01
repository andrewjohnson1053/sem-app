<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tournament_admin', function (Blueprint $table) {
            $table->foreign('tournament_id')
            ->on('tournaments')
            ->references('id')
            ->cascadeOnDelete();
            $table->foreign('admin_id')
            ->on('users')
            ->references('id')
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
        Schema::table('tournament_admin', function (Blueprint $table) {
            $table->dropConstrainedForeignId('tournament_id');
            $table->dropConstrainedForeignId('admin_id');
        });
    }
}
