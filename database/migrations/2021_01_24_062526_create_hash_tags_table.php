<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHashTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hash_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->timestamps();
        });
    Schema::create('hash_tag_place', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hash_tag_id')->unsigned();
            $table->unsignedBigInteger('place_id')->unsigned();
            $table->timestamps();
            
            // 外部キー制約
            $table->foreign('hash_tag_id')->references('id')->on('hash_tags')->onDelete('cascade');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('hash_tag_place');
        Schema::dropIfExists('hash_tags');
        
    }
}
