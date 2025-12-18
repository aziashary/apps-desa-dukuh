<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sk', function (Blueprint $table) {
            $table->bigIncrements('id_sk');
            $table->string('id_kodesk');
            $table->string('kode_sk');
            $table->string('jenis_sk');
            $table->string('no_sk')->unique();
            $table->string('id_warga');
            $table->json('detail_sk')->nullable();
            $table->json('keterangan_sk');
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
        Schema::dropIfExists('sku');
    }
}
