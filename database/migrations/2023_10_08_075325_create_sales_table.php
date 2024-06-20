<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Utils\Strings;

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
            $table->bigInteger('idmedis')->unsigned(); // ให้เปลี่ยนเป็น bigInteger
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idmedis')->references('id')->on('medis')->onDelete('cascade');
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
