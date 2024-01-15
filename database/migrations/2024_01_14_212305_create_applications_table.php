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
    Schema::create('applications', function (Blueprint $table) {
        $table->bigIncrements('applicationId'); // This creates an auto-incrementing primary key column named 'applicationId'
        $table->string('business_name')->unique();
        $table->string('business_role');
        $table->string('business_category');
        $table->text('business_information');
        $table->time('business_operating_hour');
        $table->datetime('business_start_date');
        $table->string('ssm_pdf');
        $table->string('business_proposal_pdf');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
