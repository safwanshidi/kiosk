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
        Schema::create('payment_status', function (Blueprint $table) {
			$table->string('status',255);
			$table->foreignId('arrears_id')->references('id')->on('arrears');
			$table->foreignId('users_id')->references('id')->on('users');
			$table->primary(['arrears_id', 'users_id']);
			
			
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status');
    }
};
