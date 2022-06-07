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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_item');
            // foreign key: id_oleh
            $table->bigInteger('id_oleh')->unsigned();
            $table->foreign('id_oleh')->references('id')->on('oleh');
            // foreign key: id_transaksi
            $table->bigInteger('id_transaksi')->unsigned();
            $table->foreign('id_transaksi')->references('id')->on('transaksi');
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
        Schema::dropIfExists('pesanan');
    }
};
