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
        Schema::table('orders', function (Blueprint $table) {
            //delete kolom
            $table->dropColumn(['car_color', 'car_category']);

            //menambahkan kolom baru sebagai foreign key
            $table->foreignId('car_color_id')->nullable()->references('id')->on('car_colors')->onDelete('cascade');
            $table->foreignId('car_category_id')->nullable()->references('id')->on('car_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //Rollback:: hapus foreign key
            $table->dropForeign(['car_color_id']);
            $table->dropForeign(['car_category_id']);
            $table->dropColumn(['car_color_id', 'car_category_id']);

            //tambah lagi kolom string sebelumnya
            $table->string('car_color', 15);
            $table->string('car_category', 15);
        });
    }
};
