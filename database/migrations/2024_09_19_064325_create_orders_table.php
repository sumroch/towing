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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('car_name', 64);
            $table->string('number_plate', 15);
            $table->string('car_color', 15);
            $table->string('car_category', 15);
            $table->string('car_condition', 15);
            $table->string('memo', 191)->nullable();
            $table->date('date');
            $table->string('time', 15)->nullable();
            $table->string('pic_1', 15);
            $table->string('pic_2', 15);
            $table->date('date_confirm')->nullable();
            $table->string('time_confirm', 15)->nullable();
            $table->boolean('is_confirm')->default(0);
            $table->boolean('is_done')->default(0);
            $table->foreignId('towing_id')->nullable()->references('id')->on('towing')->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('store_origin')->nullable()->references('id')->on('stores')->onDelete('cascade');
            $table->foreignId('store_destination')->nullable()->references('id')->on('stores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
