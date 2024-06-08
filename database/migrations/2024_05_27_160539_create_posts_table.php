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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('text')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->string('image')->nullable();
            $table->boolean('bool')->nullable();
//            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('created_date');
            $table->timestamp('updated_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
