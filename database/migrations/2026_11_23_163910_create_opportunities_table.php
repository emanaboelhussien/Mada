<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
   public function up(): void
{
    Schema::create('opportunities', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('type');
        $table->string('organization_name');
        $table->string('field')->nullable();
        $table->date('deadline')->nullable();
        $table->timestamp('last_verified_at')->nullable();
        $table->string('status')->default('مفتوحة');
        $table->timestamps();
    });
}
    
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
