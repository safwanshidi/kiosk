<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApplicationIdToKioskapproval extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('kioskapproval')) {
           
    Schema::create('kioskapproval', function (Blueprint $table) {
        $table->id('kioskID');
        $table->foreignId('application_id')->constrained();
        $table->foreignId('user_id')->constrained('users');
        $table->string('KioskNo');
        $table->enum('kioskStatus', ['Approved', 'Waiting', 'Rejected']);
        $table->timestamps(); // Adds created_at and updated_at columns
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
