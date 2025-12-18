<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKodeskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kodesk', function (Blueprint $table) {
            $table->bigIncrements('id_kodesk');
            $table->string('kode_sk')->unique();
            $table->string('jenis_sk');
            $table->string('singkatan_sk')->nullable();
            $table->string('jumlah_warga');
            $table->json('keterangan_kodesk');
            $table->string('file_name')->unique();
            $table->string('url_print')->nullable();
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
        Schema::dropIfExists('kodesk');
    }
}
