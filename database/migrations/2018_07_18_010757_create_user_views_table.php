<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_views', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->integer('auth_id')->default(0);

            $table->integer('profile')->default(0);
            $table->integer('profile_email')->default(0);
            $table->integer('profile_phone')->default(0);
            $table->integer('portfolio')->default(0);
            $table->integer('portfolio_project')->default(0);

            $table->text('ip_address')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('user_views');
    }
}
