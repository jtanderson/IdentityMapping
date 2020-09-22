<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeSurveyPolymorphic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('surveyanswers', function(Blueprint $table){
        $table->dropForeign(['participant_id']);
        $table->dropColumn('participant_id');
        $table->unsignedBigInteger('surveyable_id');
        $table->string('surveyable_type');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('surveyanswers', function(Blueprint $table){
        $table->dropColumn('surveyable_id');
        $table->dropColumn('surveyable_type');
        $table->unsignedBigInteger('participant_id');
        $table->foreign('participant_id')->references('id')->on('participant');
      });
    }
}
