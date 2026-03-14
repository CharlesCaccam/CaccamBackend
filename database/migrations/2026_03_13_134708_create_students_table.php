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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('student_id')->unique();
        $table->string('first_name');
        $table->string('last_name');
        $table->enum('gender', ['Male', 'Female']);
        $table->string('email')->unique();
        $table->string('course_code');
        $table->integer('year_level');
        $table->string('municipality');
        $table->date('enrollment_date');
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
