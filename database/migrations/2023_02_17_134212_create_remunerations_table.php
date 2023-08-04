<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemunerationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remunerations', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_id');
            $table->integer('category_id');
            $table->integer('rate_id');
            $table->integer('course_id')->nullable();
            $table->integer('user_id');
            $table->integer('number')->nullable();
            $table->integer('students')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remunerations');
    }
}
