<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {

            $table->foreignId('fee_structure_id')
                  ->nullable()
                  ->after('batch_id')
                  ->constrained()
                  ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {

            $table->dropForeign(['fee_structure_id']);

            $table->dropColumn('fee_structure_id');

        });
    }
};