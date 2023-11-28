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
        Schema::create('counterparts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->integer('month');
            $table->integer('year');
            $table->integer('amount_due');
            $table->integer('amount_paid');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counterparts');
    }
};
