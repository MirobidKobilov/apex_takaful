<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('title_ru', 255);
            $table->string('title_uz', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->string('short_text_ru', 255);
            $table->string('short_text_uz', 255)->nullable();
            $table->string('short_text_en', 255)->nullable();
            $table->enum('type', ['article', 'news']);
            $table->text('text_ru');
            $table->text('text_uz')->nullable();
            $table->text('text_en')->nullable();
            $table->unsignedBigInteger('view_count')->default(0);
            $table->dateTime('published_at');
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
        Schema::dropIfExists('articles');
    }
}
