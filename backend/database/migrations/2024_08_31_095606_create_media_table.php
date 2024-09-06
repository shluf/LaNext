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
        Schema::create('media', function (Blueprint $table) {
            $table->id('Media_ID');
            $table->string('File_Name', 255);
            $table->string('File_Path', 255);
            $table->enum('Media_Type', ['Image', 'Video', 'Audio']);
            $table->timestamp('Date_Uploaded')->useCurrent();
            $table->unsignedBigInteger('Article_ID')->nullable();
            $table->foreign('Article_ID')->references('Article_ID')->on('articles')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
