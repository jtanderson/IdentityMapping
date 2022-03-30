<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHarmonyQuestionIntersectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harmonyquestionintersection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('text');
            $table->string('extreme_left');
            $table->string('extreme_right');
            $table->string('degrees');
            $table->boolean('active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('harmonyquestionintersection');
    }
}
