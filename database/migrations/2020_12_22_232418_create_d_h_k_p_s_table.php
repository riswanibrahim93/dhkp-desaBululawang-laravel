<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDHKPSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dhkp', function (Blueprint $table) {
            $table->id();
            $table->string('nop');
            $table->string('alamat')->nullable();
            $table->string('rt_rw')->nullable();
            $table->string('luas_tanah')->nullable();
            $table->string('luas_bangunan')->nullable();
            $table->string('persil')->nullable();
            $table->string('c')->nullable();
            $table->string('nama_wp')->nullable();
            $table->string('nama_kepemilikan')->nullable();
            $table->string('alamat_wp')->nullable();
            $table->string('rt_rw_wp')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kota')->nullable();
            $table->string('pbb')->nullable();
            $table->string('lat')->nullable()->default('-8.0781');
            $table->string('longi')->nullable()->default('112.6446');
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
        Schema::dropIfExists('dhkp');
    }
}
