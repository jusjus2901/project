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
        Schema::create('summary_reports', function (Blueprint $table) {
            $table->id();
            $table->string('user_inspected');
            $table->text('observation');
            $table->date('date_inspected');
            $table->string('status');
            $table->text('full_information');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary_reports');
    }
};
