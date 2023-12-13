<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSocialmediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_socialmedia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('socialmedia_id');
            $table->foreign('socialmedia_id')->references('id')->on('socialmedia')->onDelete('cascade');
            $table->string('name');
            $table->text('url');
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
        Schema::dropIfExists('site_socialmedia');
    }
};
