<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('email')->unique();  
            $table->string('password');  
            $table->string('address1');
            $table->string('address2');
            $table->string('phone_no1');
            $table->string('phone_no2');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->bigInteger('user_type_id')->nullable(); 
              
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
        Schema::dropIfExists('users');
    }
}
