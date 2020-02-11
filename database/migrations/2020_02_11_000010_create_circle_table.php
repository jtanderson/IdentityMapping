<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCircleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circle', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('label');
            $table->string('radius');
            $table->string('center_x');
            $table->string('center_y');
            $table->string('color');
            $table->string('line_style');
            $table->string('number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circle');
    }
}
