<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{

    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();

            $table->longText('body')->nullable();

            $table->text('description1')->nullable();
            $table->text('description2')->nullable();
            $table->text('description3')->nullable();

            $table->foreignId('banner1')->nullable();
            $table->foreignId('banner2')->nullable();
            $table->foreignId('banner3')->nullable();

            $table->foreign('banner1')->references('id')->on('media')->onDelete('set null');
            $table->foreign('banner2')->references('id')->on('media')->onDelete('set null');
            $table->foreign('banner3')->references('id')->on('media')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}

