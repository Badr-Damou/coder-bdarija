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
        Schema::create('blog_images', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('blog_id')->constrained('blogs')->onDelete('cascade');
            $table->string('image_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_images', function(Blueprint $table){
            $table->dropForeign(['blog_id']);
        });
        Schema::dropIfExists('blog_images');
    }
};
