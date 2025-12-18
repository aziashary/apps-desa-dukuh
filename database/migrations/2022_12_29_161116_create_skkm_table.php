<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSKKMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skkm', function (Blueprint $table) {
            $table->bigIncrements('id_skkm');
            $table->string('no_skkm')->unique();
            $table->string('id_warga');
            $table->string('keterangan');
            $table->string('usulan_surat');
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
        Schema::dropIfExists('skkm');
    }
}
