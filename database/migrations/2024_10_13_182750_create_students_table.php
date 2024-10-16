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
            $table->string('admission_no')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('category')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('student_photo')->nullable(); 
            $table->string('height')->nullable(); 
            $table->string('weight')->nullable();
            $table->string('measurement_date')->nullable();
            $table->text('medical_history')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_photo')->nullable(); 
            $table->string('mother_name')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_photo')->nullable(); 
            $table->string('guardian_is')->nullable(); 
            $table->string('guardian_name')->nullable();
            $table->string('guardian_relation')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_occupation')->nullable();
            $table->string('guardian_email')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('guardian_photo')->nullable();
            $table->string('current_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
