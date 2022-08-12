<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sales_det', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('sales_id')->references('id')->on('t_sales')->onDelete('cascade');
            $table->foreignId('barang_id')->references('id')->on('m_barang')->onDelete('cascade');
            $table->decimal('harga_bandrol', 20, 2);
            $table->integer('qty');
            $table->decimal('diskon_pct', 20, 2)->nullable();
            $table->decimal('diskon_nilai', 20, 2)->nullable();
            $table->decimal('harga_diskon', 20, 2)->nullable();
            $table->decimal('total', 20, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sales_det');
    }
};
