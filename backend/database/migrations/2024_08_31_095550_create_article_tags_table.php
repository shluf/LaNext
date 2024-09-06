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
        Schema::create('article_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('Article_ID');
            $table->unsignedBigInteger('Tag_ID');
            $table->primary(['Article_ID', 'Tag_ID']);
            $table->foreign('Article_ID')->references('Article_ID')->on('articles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Tag_ID')->references('Tag_ID')->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_tags');
    }
};
