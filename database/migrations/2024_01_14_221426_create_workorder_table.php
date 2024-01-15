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
        Schema::create('workorder', function (Blueprint $table) {
            $table->id('workorder_id');
            $table->string('c_name', 255);
            $table->string('tech_name', 255);
            $table->date('wo_date', 255);
            $table->string('c_type', 255);
            $table->string('wo_details', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workorder');
    }
};
