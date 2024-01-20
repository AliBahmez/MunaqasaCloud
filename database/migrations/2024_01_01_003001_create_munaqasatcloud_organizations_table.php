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
        Schema::create('munaqasatcloud__organizations', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->unique();
            $table->string('name')->unique();
            $table->string('title');
            $table->unsignedBigInteger('contact_statement')->unique();
            $table->string('description');
            $table->string('trade_document');
            $table->integer('state')->default(0);
            $table->string('accountnumber')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('munaqasatcloud_organizations');
    }
};
