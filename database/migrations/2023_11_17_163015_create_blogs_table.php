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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->nullable();
            $table->integer('parent_category_id')->nullable();
            $table->integer('category_id');
            $table->string('blog_title');
            $table->string('seo_title')->nullable();
            $table->string('blog_image')->nullable();
            $table->longText('blog_description')->nullable();
            $table->longText('seo_description')->nullable();
            $table->string('seo_tags')->nullable();
            $table->bigInteger('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
