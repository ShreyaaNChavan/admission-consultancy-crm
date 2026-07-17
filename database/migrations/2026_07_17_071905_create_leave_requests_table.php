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
        Schema::create('leave_requests', function (Blueprint $table) {

            $table->id();

            $table->foreignId('employee_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('leave_type', [
                'Casual',
                'Sick',
                'Annual',
                'Maternity',
                'Paternity',
                'Emergency',
                'Unpaid'
            ]);

            $table->date('from_date');

            $table->date('to_date');

            $table->unsignedInteger('total_days');

            $table->text('reason');

            $table->enum('status', [
                'Pending',
                'Approved',
                'Rejected'
            ])->default('Pending');

            $table->text('admin_remark')->nullable();

            $table->timestamp('approved_at')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_requests');
    }
};