<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Yazdan\Product\Repositories\ProductRepository;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('media_id')->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('set null');

            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('body')->nullable();
            $table->enum('status',ProductRepository::$statuses);

            $table->bigInteger('views')->unsigned()->default(0)->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
