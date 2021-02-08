<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTextContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('textcontent', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('content'); // the actual html of the content
            $table->string('key');   // the logical name, e.g. 'start-paragraph-one'
            $table->text('description'); // describe the content for the admin
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('textcontent');
    }
}
