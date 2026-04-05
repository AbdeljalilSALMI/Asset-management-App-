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
        Schema::create('supply_request', function (Blueprint $table) {
            $table->id();
            //foreign keys
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('supplier_id');
            // Asset details
            $table->string('asset_name');
            $table->string('category');
            $table->text('description')->nullable();

            // Status: pending, accepted, rejected
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');

            // Foreign key constraints
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supply_request');
    }
};
