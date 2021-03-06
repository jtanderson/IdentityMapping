<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToCircleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('circle', function (Blueprint $table) {
          $table->unsignedBigInteger('category_id')->nullable();
          $table->foreign('category_id')
            ->references('id')
            ->on('category');
          //$table->unsignedBigInteger('category_id')->nullable()->change();
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
            $table->dropColumn('category_id');
        });
    }
}
