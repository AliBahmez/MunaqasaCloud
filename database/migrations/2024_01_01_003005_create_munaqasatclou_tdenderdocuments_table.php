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
        Schema::create('munaqasatcloud__tender_documents', function (Blueprint $table) {
            $table->id();
            $table->string('technical_title');
            $table->string('technical_description');
            $table->foreignId('tender_id')->constrained('munaqasatcloud__tenders')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munaqasatcloud_tender_documents');
    }
};
