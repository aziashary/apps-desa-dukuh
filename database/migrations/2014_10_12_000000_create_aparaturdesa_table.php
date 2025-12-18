<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAparaturdesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aparaturdesa', function (Blueprint $table) {
            $table->bigIncrements('id_aparatur');
            $table->string('nama_aparatur');
            $table->string('id_jabatan');
            $table->string('nama_jabatan');
            $table->string('kategori_jabatan');
            $table->string('facebook_aparatur')->nullable();
            $table->string('instagram_aparatur')->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE aparaturdesa ADD foto_aparatur MEDIUMBLOB");
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aparaturdesa');
    }
}
