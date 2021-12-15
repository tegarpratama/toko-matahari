<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonfirmasiPesananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi_pesanan', function (Blueprint $table) {
            $table->id();
            $table->integer('pesanan_id');
            $table->string('no_rekening', 20);
            $table->string('nama_rekening', 20);
            $table->integer('nominal');
            $table->string('catatan', 50)->nullable();
            $table->string('bukti_transfer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konfirmasi_pesanan');
    }
}
