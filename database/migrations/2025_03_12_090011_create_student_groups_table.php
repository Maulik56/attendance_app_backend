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
        Schema::create('student_groups', function (Blueprint $table) {
            $table->id();
            $table->integer('franchise_id')->nullable();
            $table->integer('instructor_id')->nullable();
            $table->string('cw_uid')->nullable();
            $table->string('group_name')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->integer('payer_id')->nullable();
            $table->integer('price_type_id')->nullable();
            $table->integer('program_id')->nullable();
            $table->float('pos_id')->nullable();
            $table->float('total_revenue_share')->nullable();
            $table->float('your_revenue_share')->nullable();
            $table->string('value')->nullable();
            $table->float('communication_mode')->nullable();
            $table->string('frequency')->nullable();
            $table->string('day')->nullable();
            $table->integer('number_of_lessons')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_groups');
    }
};
