<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeteranganskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterangansk', function (Blueprint $table) {
            $table->bigIncrements('id_keterangansk');
            $table->string('id_kodesk')->unique();
            $table->string('kode_sk')->nullable();
            $table->json('detail_keterangansk')->nullable();
            $table->json('keterangan')->nullable();
            

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
        Schema::dropIfExists('keterangansk');
    }
}
