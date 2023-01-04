<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CandidateAcademics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_academics', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('board'); 
            $table->string('passout_year'); 
            $table->string('percentage'); 
            $table->bigInteger('academics_type_id')->nullable(); 
            $table->foreign('academics_type_id')->references('id')->on('academic_type');  
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
        Schema::dropIfExists('candidate_academics');
    }
}
