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
        Schema::create('briefs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('estimated_duration');
            $table->foreignId('teacher_id')->constrained('users')->onDelete('set null');
            $table->foreignId('sprint_id')->constrained('sprints')->onDelete('cascade');
            $table->enum('brief_type',['INDIVIDUAL','COLLECTIVE']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('briefs');
    }
};
