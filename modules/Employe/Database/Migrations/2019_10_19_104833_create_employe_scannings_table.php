<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeScanningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employe_scannings', function (Blueprint $table) {
            $table->unsignedBigInteger('employe_id');
            $table->string('photo_ktp');
            $table->string('photo_kta');
            $table->string('photo_kk');
            $table->string('ijazah')->nullable();
            $table->string('sertifikat')->nullable();

            $table->timestamps();
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employe_scannings');
    }
}
