<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorilaporanAnakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorilaporan_anak', function (Blueprint $table) {
            $table->id('id_kategori');
            $table->string('nama_kategori');
            $table->unsignedBigInteger('id_induk');
            $table->foreign('id_induk')->references('id')->on('kategorilaporan_induk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategorilaporan_anak');
    }
}
