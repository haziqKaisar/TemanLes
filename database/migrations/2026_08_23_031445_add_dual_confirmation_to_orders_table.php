<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->timestamp('student_confirmed_at')->nullable()->after('completed_at');
            $table->timestamp('teacher_confirmed_at')->nullable()->after('student_confirmed_at');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['student_confirmed_at', 'teacher_confirmed_at']);
        });
    }
};
