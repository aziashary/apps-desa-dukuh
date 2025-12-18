<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetaildokumentasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detaildokumentasi', function (Blueprint $table) {
            $table->bigIncrements('id_detaildokumentasi');
            $table->integer('id_dokumentasi');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE detaildokumentasi ADD gambar_detaildokumentasi MEDIUMBLOB");
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detaildokumentasi');
    }
}
