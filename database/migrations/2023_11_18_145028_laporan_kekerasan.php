<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_kekerasan', function(Blueprint $table){
            $table->id();
            $table->integer('nim');
            $table->string('nama');
            $table->string('telepon');
            $table->string('jenis');
            $table->string('report');
            $table->string('filepath');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};