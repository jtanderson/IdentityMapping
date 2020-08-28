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
        $table->renameColumn('participant_id','surveyable_id');
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
        $table->renameColumn('surveyable_id', 'participant_id');
        $table->dropColumn('surveyable_type');
      });
    }
}
