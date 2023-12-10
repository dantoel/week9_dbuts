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
        Schema::create('login_mhs', function(Blueprint $table){
            $table->id();
            $table->integer('nim');
            $table->string('nama_mhs');
            $table->string('status_akhir');
            $table->double('ipk');
            $table->integer('total_sks');
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
