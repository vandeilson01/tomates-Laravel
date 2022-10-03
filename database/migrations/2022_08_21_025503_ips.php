<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ips extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('user')->nullable();
            $table->text('keyuser')->nullable();
            $table->text('ip')->nullable();
            $table->date('date')->nullable();
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
        //
        Schema::dropIfExists('ips');
    }
}
