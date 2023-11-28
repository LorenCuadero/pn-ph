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
        Schema::create('disciplinaries', function (Blueprint $table) {
            $table->id();
            $table->text('verbal_warning_description')->nullable();
            $table->date('verbal_warning_date')->nullable();
            $table->text('written_warning_description')->nullable();
            $table->date('written_warning_date')->nullable();
            $table->text('provisionary_description')->nullable();
            $table->date('provisionary_date')->nullable();
            $table->foreignId('student_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disciplinaries');
    }
};
