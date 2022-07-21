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
            $table->bigInteger('status_id')->unsigned();
            $table->bigInteger('rak_id')->unsigned();
            $table->bigInteger('jenis_data_id')->unsigned();
            $table->integer('kode_cabang');
            $table->bigInteger('kode_user_id')->unsigned();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('jenis_data_id')->references('id')->on('jenis_data')->onDelete('cascade');
            $table->foreign('rak_id')->references('id')->on('raks')->onDelete('cascade');
            $table->foreign('kode_user_id')->references('id')->on('users')->onDelete('cascade');
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
