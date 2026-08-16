<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code')->unique();
            $table->foreignId('student_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('tutor_id')->constrained('tutors')->cascadeOnDelete();
            $table->foreignId('tutor_subject_id')->constrained('tutor_subjects')->cascadeOnDelete();

            $table->enum('teaching_mode', ['online', 'offline']);
            $table->date('scheduled_date');
            $table->time('scheduled_time');
            $table->unsignedSmallInteger('duration_minutes')->default(60);

            // Lokasi GPS (khusus offline)
            $table->decimal('location_lat', 10, 7)->nullable();
            $table->decimal('location_lng', 10, 7)->nullable();
            $table->text('location_address')->nullable();
            $table->text('location_note')->nullable();

            // Perhitungan biaya
            $table->decimal('price_per_hour', 12, 2);
            $table->decimal('total_price', 12, 2);
            $table->decimal('admin_commission_percent', 5, 2)->default(10);
            $table->decimal('admin_commission_amount', 12, 2);
            $table->decimal('tutor_earning_amount', 12, 2);

            $table->enum('status', [
                'pending_payment', 'waiting_verification', 'confirmed',
                'ongoing', 'completed', 'cancelled', 'rejected',
            ])->default('pending_payment');

            $table->text('cancel_reason')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
