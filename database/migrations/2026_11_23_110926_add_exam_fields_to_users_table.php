<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('exam_completed')->default(false);
            $table->string('exam_track')->nullable(); // web أو ai
            $table->unsignedTinyInteger('exam_score')->nullable(); // من 0 إلى 20
            $table->string('exam_level')->nullable(); // مبتدئ، متوسط، متقدم
            $table->timestamp('exam_completed_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'exam_completed',
                'exam_track',
                'exam_score',
                'exam_level',
                'exam_completed_at',
            ]);
        });
    }
};