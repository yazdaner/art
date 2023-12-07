<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Yazdan\CustomerOrder\Repositories\CustomerOrderRepository;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->id();
            $table->string('key')->nullable();

            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('media_id')->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('set null');

            $table->string("name");
            $table->string("phone",14);
            $table->text("description");

            $table->enum("size", CustomerOrderRepository::$sizes);
            $table->enum("canvas", CustomerOrderRepository::$canvas_types);
            $table->enum("shape", CustomerOrderRepository::$shapes);
            $table->json("invoicing", CustomerOrderRepository::$invoicing);


            $table->text("response")->nullable();

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
        Schema::dropIfExists('customer_orders');
    }
}
