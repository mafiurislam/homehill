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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('short')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('icon')->default('Mountain');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category_slug')->nullable()->index();
            $table->string('destination')->nullable();
            $table->string('duration')->nullable();
            $table->decimal('price', 10, 2)->default(0);
            $table->decimal('original_price', 10, 2)->nullable();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->json('highlights')->nullable();
            $table->json('inclusions')->nullable();
            $table->json('exclusions')->nullable();
            $table->string('type')->default('regular'); // regular, group, corporate, excursion
            $table->boolean('featured')->default(false);
            $table->boolean('popular')->default(false);
            $table->json('departure_dates')->nullable();
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('destination')->nullable();
            $table->integer('rating')->default(5);
            $table->text('review');
            $table->string('photo')->nullable();
            $table->timestamps();
        });

        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('destinations'); // destinations, hotels, group_tours, transport, nature
            $table->string('image');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('contact_number');
            $table->string('email')->nullable();
            $table->string('destination')->nullable();
            $table->string('from_location')->nullable();
            $table->string('members')->nullable();
            $table->text('message')->nullable();
            $table->string('package_name')->nullable();
            $table->string('type')->default('booking'); // booking, quick_inquiry, contact
            $table->string('status')->default('new'); // new, contacted, completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
        Schema::dropIfExists('gallery_images');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('tour_packages');
        Schema::dropIfExists('categories');
    }
};
