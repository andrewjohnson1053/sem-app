<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('draw_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('first_participant_id');
            $table->unsignedBigInteger('second_participant_id');
            $table->text('first_participant_score');
            $table->text('second_participant_score');
            $table->unsignedBigInteger('winner_id');
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
        Schema::dropIfExists('matches');
    }
}
