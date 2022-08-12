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
        Schema::create('t_sales', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 15)->unique();
            $table->dateTime('tgl');
            $table->integer('jumlah_barang')->nullable();
            $table->foreignId('cust_id')->references('id')->on('m_customer')->onDelete('cascade');
            $table->decimal('subtotal', 20, 2);
            $table->decimal('diskon', 20, 2)->nullable();
            $table->decimal('ongkir', 20, 2)->nullable();
            $table->decimal('total_bayar', 20, 2);
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
        Schema::dropIfExists('t_sales');
    }
};
