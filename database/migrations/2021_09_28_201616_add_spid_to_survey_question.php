<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpidToSurveyQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surveyquestion', function (Blueprint $table) {
            $table->unsignedBigInteger('surveypage_id')->nullable(); 
            $table->foreign('surveypage_id')->references('id')->on('surveypage');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surveyquestion', function (Blueprint $table) {
            $table->dropColumn('surveypage_id')->nullable();
        });
    }
}
