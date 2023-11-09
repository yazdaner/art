<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Yazdan\Course\Repositories\CourseRepository;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');

            $table->foreignId('media_id')->nullable();
            $table->foreign('media_id')->references('id')->on('media')->onDelete('set null');

            $table->foreignId('video_id')->nullable();
            $table->foreign('video_id')->references('id')->on('media')->onDelete('set null');

            $table->string('title');
            $table->string('slug');
            $table->string('spot_course_token');
            $table->text('description')->nullable();
            $table->longText('body')->nullable();

            $table->unsignedInteger('price')->default(0);
            $table->unsignedInteger('price2')->nullable();
            $table->unsignedInteger('time')->nullable();

            $table->float('priority')->nullable();
            $table->enum('status', CourseRepository::$statuses);

            $table->bigInteger('views')->unsigned()->default(0)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
