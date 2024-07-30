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

            $table->json("name")->nullable();
            $table->json("description")->nullable();
            $table->json("slugs")->nullable();
            $table->json("images")->nullable();
            $table->json("additional_data")->nullable();
            $table->integer("order_number")->default(1);
            $table->boolean("status")->default(true);

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references("id")->on("users")->onDelete('cascade');

            $table->unsignedBigInteger('setting_id')->nullable();
            $table->foreign('setting_id')->references("id")->on("settings")->onDelete('cascade');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references("id")->on("categories")->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
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
