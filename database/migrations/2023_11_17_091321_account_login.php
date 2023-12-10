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
        Schema::create('account_login', function(Blueprint $table) {
            $table->id();
            $table->string('nim');
            $table->string('nama');
            $table->string('nomor_telepon');
            $table->string('email');
            $table->string('password');
            // Add more fields as needed
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
