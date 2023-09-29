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
        Schema::create('body_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("user_id");
            $table->date("date");
            $table->float("weight");
            $table->float("body_fat");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('body_records');
    }
};
