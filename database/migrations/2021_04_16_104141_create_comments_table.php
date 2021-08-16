<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('description_ru');
            $table->string('description_uz')->nullable();
            $table->string('description_en')->nullable();
            $table->string('job_ru');
            $table->string('job_uz')->nullable();
            $table->string('job_en')->nullable();
            $table->string('name_ru');
            $table->string('name_uz')->nullable();
            $table->string('name_en')->nullable();
            $table->string('img')->nullable();
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
        Schema::dropIfExists('comments');
    }
}
