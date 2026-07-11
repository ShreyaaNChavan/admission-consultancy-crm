<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {

            $table->id();

            $table->string('student_code')->unique();

            $table->foreignId('lead_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('full_name');

            $table->string('phone',15);

            $table->string('email')->nullable();

            $table->foreignId('course_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->unsignedBigInteger('batch_id')->nullable();

            $table->date('admission_date');

            $table->enum('status',[
                'Active',
                'Completed',
                'Cancelled',
                'Dropped'
            ])->default('Active');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};