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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('iduser')->unsigned(); // ให้เปลี่ยนเป็น bigInteger
            $table->bigInteger('idmedis')->unsigned();
            $table->timestamps();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idmedis')->references('id')->on('medis')->onDelete('cascade');
            $table->string('role')->default('wait');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
