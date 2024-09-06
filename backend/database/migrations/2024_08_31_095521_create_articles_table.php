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
        Schema::create('articles', function (Blueprint $table) {
            $table->id('Article_ID');
            $table->string('Title', 255);
            $table->text('Content');
            $table->text('Summary')->nullable();
            $table->timestamp('Publish_Date')->nullable();
            $table->enum('Status', ['Draft', 'Published', 'Archived']);
            $table->unsignedBigInteger('Category_ID')->nullable();
            $table->unsignedBigInteger('Author_ID')->nullable();
            $table->unsignedBigInteger('Editor_ID')->nullable();
            $table->integer('View_Count')->default(0);
            $table->foreign('Category_ID')->references('Category_ID')->on('categories')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('Author_ID')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('Editor_ID')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
