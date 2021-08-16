<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title_ru');
            $table->string('title_uz')->nullable();
            $table->string('title_en')->nullable();
            $table->string('short_text_ru');
            $table->string('short_text_uz')->nullable();
            $table->string('short_text_en')->nullable();
            $table->text('description_ru');
            $table->text('description_uz')->nullable();
            $table->text('description_en')->nullable();
            $table->enum('type', ['family', 'general']);
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
        Schema::dropIfExists('products');
    }
}
