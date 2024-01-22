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
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('summary',255);
            $table->bigInteger('price');
            $table->char('image', 200);
            $table->bigInteger('discount');
            $table->bigInteger('duration');
            $table->string('Grade',100)->nullable();
            $table->boolean('status')->default(1);
            $table->longText('detail');
            $table->timestamps();
            // ID Course Cate
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course');
    }
};
