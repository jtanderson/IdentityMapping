<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntersectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intersection', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('circle1_id');
            $table->unsignedBigInteger('circle2_id')->nullable();
            $table->unsignedBigInteger('circle3_id')->nullable();
            $table->unsignedBigInteger('circle4_id')->nullable();
            $table->unsignedBigInteger('circle5_id')->nullable();
            $table->foreign('circle1_id')->references('id')->on('circle');
            $table->foreign('circle2_id')->references('id')->on('circle');
            $table->foreign('circle3_id')->references('id')->on('circle');
            $table->foreign('circle4_id')->references('id')->on('circle');
            $table->foreign('circle5_id')->references('id')->on('circle');
            $table->string('color');
            $table->string('area');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intersection');
    }
}
