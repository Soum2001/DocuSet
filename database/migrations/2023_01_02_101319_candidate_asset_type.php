<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CandidateAssetType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_asset_type', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('asset_path'); 
            $table->string('asset_type'); 
            $table->bigInteger('academics_type_id')->nullable(); 
            $table->foreign('academics_type_id')->references('id')->on('academic_type');  
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
        //
    }
}
