<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDemographicsToParticipant extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participant', function (Blueprint $table) {
          $table->string('gender')->nullable();
          $table->string('age')->nullable();
          $table->string('isHispanic')->nullable();
          $table->string('ethnicity')->nullable();
          $table->string('marital')->nullable();
          $table->string('degree')->nullable();
          $table->string('major')->nullable();
          $table->string('employment')->nullable();
          $table->string('income')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participant', function (Blueprint $table) {
            //
        });
    }
}
