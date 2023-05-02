<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumenPribadiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumen_pribadi', function (Blueprint $table) {
            $table->id();
            $table->string('data1');
            $table->string('data2');
            $table->string('data3');
            $table->string('data4');
            $table->string('data5');
            $table->string('data6');
            $table->string('data7');
            $table->string('status');
            $table->unsignedBigInteger('id_kategori_dokumen');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_kategori_dokumen')->references('id')->on('kategori_administrasi');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumen_pribadi');
    }
}
