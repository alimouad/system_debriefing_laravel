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
        Schema::create('classroom_teacher', function (Blueprint $table) {
            $table->foreignId('classroom_id')->constrained()->onDelete('cascade');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
        });

        Schema::create('classroom_sprint', function (Blueprint $table) {
            $table->foreignId('classroom_id')->constrained()->onDelete('cascade');
            $table->foreignId('sprint_id')->constrained()->onDelete('cascade');
        });

        Schema::create('brief_skill', function (Blueprint $table) {
            $table->foreignId('brief_id')->constrained()->onDelete('cascade');
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
        });

        Schema::create('skill_evaluation', function (Blueprint $table) {
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->foreignId('evaluation_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_teacher');
        Schema::dropIfExists('classroom_sprint');
        Schema::dropIfExists('brief_skill');
        Schema::dropIfExists('skill_evaluation');
    }
};
