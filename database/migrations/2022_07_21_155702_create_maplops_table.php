<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaplopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maplops', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('status_id')->unsigned()->nullable();
            $table->bigInteger('rak_id')->unsigned()->nullable();
            $table->bigInteger('jenis_data_id')->unsigned()->nullable();
            $table->string('nama_maplop', 50)->nullable();
            $table->integer('kode_cabang');
            $table->integer('kode_user');
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('jenis_data_id')->references('id')->on('jenis_data')->onDelete('cascade');
            $table->foreign('rak_id')->references('id')->on('raks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maplops');
    }
}
