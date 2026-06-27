<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIphonesTable extends Migration
{
    public function up()
    {
        Schema::create('iphones', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('storage');
            $table->integer('harga');
            $table->integer('stok');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('iphones');
    }
}