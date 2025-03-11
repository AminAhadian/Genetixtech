<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('webinars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('webinar_category_id')->constrained('webinar_categories')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meeting_url')->nullable();
            $table->string('recording_url')->nullable();
            $table->unsignedBigInteger('max_participants')->default(0);
            $table->unsignedBigInteger('price')->default(0);
            $table->string('cover_image_url')->nullable();
            $table->text('description');
            $table->string('status')->default('Draft');
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webinars');
    }
};
