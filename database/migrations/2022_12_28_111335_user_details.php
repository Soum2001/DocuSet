<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('city')->unique();
            $table->string('state');
            $table->string('Phone_no');
            $table->string('zip');
            $table->string('password');
            $table->bigInteger('user_id')->nullable(); 
            $table->foreign('user_id')->references('id')->on('users');     
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
