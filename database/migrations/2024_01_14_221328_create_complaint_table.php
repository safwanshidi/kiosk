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
        Schema::create('complaint', function (Blueprint $table) {
            $table->id('complaint_id');
            $table->string('c_name', 255);
            $table->string('c_email', 255);
            $table->string('c_ic_num', 255);
            $table->string('c_type', 255);
            $table->date('c_date', 255);
            $table->string('c_details', 255);
            $table->string('c_status', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint');
    }
};
