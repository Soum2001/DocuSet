<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_type', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('user_type');    
            $table->timestamps();
        });
        // Schema::table('users', function (Blueprint $table) {
        //     $table->foreign('user_type_id')->references('id')->on('user_type');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_type');
    }
}
