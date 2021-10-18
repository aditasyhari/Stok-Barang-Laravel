<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_pembelian');
            $table->integer('total_pembelian');
            $table->integer('dibayar');
            $table->integer('kembali');
            $table->integer('hutang');
            $table->text('catatan')->nullable();
            $table->string('nama_kasir');
            $table->foreignId('pembeli_id')->references('id')->on('data_pembelis')->onDelete('cascade');
            // $table->foreignId('kasir_id')->references('id')->on('users');
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
        Schema::dropIfExists('riwayats');
    }
}
