<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasi', function (Blueprint $table) {
            $table->bigIncrements('id_dokumentasi');
            $table->string('nama_dokumentasi');
            $table->string('kategori_dokumentasi');
            $table->date('tanggal_dokumentasi');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE dokumentasi ADD gambar_dokumentasi MEDIUMBLOB");
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokumentasi');
    }
}
