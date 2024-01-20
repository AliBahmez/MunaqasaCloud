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
        Schema::create('munaqasatcloud__tenders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('description');
            $table->Integer('number');
            $table->integer('state')->default(0);
            $table->unsignedBigInteger('participation_price');
            $table->dateTime('starting_date');
            $table->dateTime('ending_date');
            $table->dateTime('open_date');
            $table->string('working_location');
            $table->unsignedBigInteger('organization_id');
            $table->foreign('organization_id')->references('id')->on('munaqasatcloud__organizations')->onDelete('cascade');  
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munaqasatcloud_tenders');
    }
};
