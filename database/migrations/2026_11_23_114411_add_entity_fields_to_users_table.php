<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('entity_name')->nullable()->after('name');
            $table->string('entity_type')->nullable()->after('entity_name');
            $table->string('website')->nullable()->after('phone');
            $table->boolean('is_approved')->default(false)->after('role');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['entity_name', 'entity_type', 'website', 'is_approved']);
        });
    }
};