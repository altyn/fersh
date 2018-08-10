<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');

            $table->json('title')->nullable();
            $table->json('desc')->nullable();
            $table->json('content')->nullable();

            $table->json('thumbnail')->nullable();
            $table->json('thumbdesc')->nullable();

            $table->integer('viewed')->default(0)->nullable();
            $table->boolean('status')->default(0)->nullable(); 

            $table->string('author')->nullable();

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
        Schema::dropIfExists('blog');
    }
}
