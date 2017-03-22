<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('abstract');
            $table->text('content');
            $table->text('author');

            $table->boolean('is_cover_news')->default(false);
            $table->string('cover_text')->nullable();
            $table->string('cover_style')->default('top');

            $table->string('slug')->unique();
            $table->timestamps();
            $table->boolean('published')->default(false);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
