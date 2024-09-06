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
        Schema::create('comments', function (Blueprint $table) {
            $table->id('Comment_ID');
            $table->unsignedBigInteger('User_ID')->nullable();
            $table->unsignedBigInteger('Article_ID');
            $table->text('Content');
            $table->timestamp('Date_Posted')->useCurrent();
            $table->foreign('User_ID')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('Article_ID')->references('Article_ID')->on('articles')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
