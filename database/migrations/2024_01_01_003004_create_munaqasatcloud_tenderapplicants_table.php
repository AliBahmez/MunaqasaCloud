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
        Schema::create('munaqasatcloud__tender_applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tender_id')->constrained('munaqasatcloud__tenders')->cascadeOnDelete();
            $table->foreignId('freelancer_id')->constrained('munaqasatcloud__freelancers')->cascadeOnDelete();
            // $table->unsignedBigInteger('user_id');
            $table->string('voucher');
            $table->boolean('status')->default(0);
            $table->timestamps();
            
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->unique(['tender_id', 'freelancer_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munaqasatcloud_tender_applicants');
    }
};
