<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('nokta');
            $table->string('noregu');
            $table->string('noktp')->unique()->nullable();
            $table->string('jabatan')->nullable();
            $table->string('alokasi')->nullable();
            $table->string('tmplahir')->nullable();
            $table->date('tgllahir')->nullable();
            $table->enum('status', ['belum kawin', 'kawin'])->nullable();
            $table->string('agama')->nullable();
            $table->string('goldarah')->nullable();
            $table->text('alamat')->nullable();
            $table->integer('rt')->nullable();
            $table->integer('rw')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->enum('baju', ['s', 'm', 'l', 'xl', 'xxl', 'xxxl'])->nullable();
            $table->integer('celana')->nullable();
            $table->integer('sepatu')->nullable();
            $table->text('photo')->nullable();
            $table->unsignedBigInteger('serikat_id')->nullable();
            $table->string('noreg')->unique()->nullable();
            $table->enum('verifikasi', ['yes', 'no'])->default('yes');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('serikat_id')->references('id')->on('serikats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
