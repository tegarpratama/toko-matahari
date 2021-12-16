<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
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
            $table->integer('member_id');
            $table->string('invoice', 15);
            $table->integer('berat');
            $table->string('kurir', 10);
            $table->string('layanan', 10);
            $table->integer('ongkir');
            $table->integer('total');
            $table->text('alamat');
            $table->enum('status', ['Belum Bayar', 'Dibayar', 'Dikirim']);
            $table->string('resi', 20)->nullable();
            $table->dateTime('tanggal');
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
}
