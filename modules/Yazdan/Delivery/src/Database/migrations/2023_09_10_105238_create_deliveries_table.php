<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliverysTable extends Migration
{

    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('delivery_amount')->default(0);
            $table->unsignedInteger('delivery_amount_per_product')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}

