<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->bigIncrements('id_warga');
            $table->string('no_kk')->nullable();
            $table->string('nik')->unique();
            $table->string('nama_warga');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('RT')->nullable();
            $table->integer('RW')->nullable();
            $table->string('desa')->nullable();
            $table->string('alamat');
            $table->string('jenis_pekerjaan');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('email')->nullable();
            $table->integer('level')->default(2);
            $table->rememberToken();
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
        Schema::dropIfExists('warga');
    }
}
