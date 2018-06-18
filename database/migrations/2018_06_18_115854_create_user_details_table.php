<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday')->nullable();
            $table->integer('country')->nullable();
            $table->string('city')->nullable();
            $table->string('sex')->nullable();
            $table->boolean('freelancer')->nullable();
            $table->json('contacts')->nullable(); // site, mail, phone, whatsapp, tg, facebook, twitter
            $table->json('spec')->nullable(); // spec, skills, sphere, experience, rate, payment_method, firm
            $table->json('bio')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
