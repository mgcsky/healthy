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
        Schema::create('recommends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("recommend_type_id");
            $table->text("description")->nullable();
            $table->text("image_url");
            $table->datetime("datetime");
            $table->text('tag')->nullable();
            $table->timestamps();
            $table->index("recommend_type_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommends');
    }
};
