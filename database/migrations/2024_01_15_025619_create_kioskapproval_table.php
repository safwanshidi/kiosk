<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKioskapprovalTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('kioskapproval')) {
            Schema::create('kioskapproval', function (Blueprint $table) {
                $table->id('kioskID');
                $table->foreignId('application_id')->constrained(); // Assuming you have an 'applications' table
                $table->foreignId('user_id')->constrained('users');
                $table->string('KioskNo');
                $table->enum('kioskStatus', ['Approved', 'Waiting', 'Rejected']);
                // Add other fields as needed
                $table->timestamps(0); // Disabling timestamps
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('kioskapproval');
    }
}
