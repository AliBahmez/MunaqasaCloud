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
        Schema::create('munaqasatcloud__tender_offer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tender_applicant_id');
            $table->unsignedBigInteger('tender_document_id');
            $table->foreign('tender_applicant_id')->references('id')->on('munaqasatcloud__tender_applicants')->onDelete('cascade');
            $table->foreign('tender_document_id')->references('id')->on('munaqasatcloud__tender_documents')->onDelete('cascade');
            // $table->unique(['tender_applicant_id', 'tender_document_id'],'munaqasa_tender_id_document_id');
            $table->unsignedBigInteger('price');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_munaqasatcloud_tender_offer');
    }
};
