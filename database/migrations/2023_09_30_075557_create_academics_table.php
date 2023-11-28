<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->string('course_code');
            $table->decimal('first_sem_1st_year', 5, 2)->nullable();
            $table->decimal('second_sem_1st_year', 5, 2)->nullable();
            $table->decimal('first_sem_2nd_year', 5, 2)->nullable();
            $table->decimal('second_sem_2nd_year', 5, 2)->nullable();
            $table->decimal('gpa', 5, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academics');
    }
};
