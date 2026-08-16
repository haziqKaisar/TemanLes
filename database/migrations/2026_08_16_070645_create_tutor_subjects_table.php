<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tutor_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->constrained('tutors')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->enum('level', ['SD', 'SMP', 'SMA', 'Umum']);
            $table->decimal('price_per_hour', 12, 2);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['tutor_id', 'subject_id', 'level']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutor_subjects');
    }
};
