<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParticipantToCircleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('circle', function (Blueprint $table) {
          $table->unsignedBigInteger('participant_id');
          $table->foreign('participant_id')
            ->references('id')
            ->on('participant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('circle', function (Blueprint $table) {
            $table->dropColumn('participant_id');
        });
    }
}
