<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSurveyPages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveypage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('header'); 
            $table->string('description')->nullable(); 
            $table->boolean('active');  
            $table->string('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveypage');
    }
}
