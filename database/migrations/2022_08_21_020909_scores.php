<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Scores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('scores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('keys2')->nullable();
            $table->text('pontos')->nullable();
            $table->text('pontos2')->nullable();
            $table->text('ip')->nullable();
            $table->text('userid')->nullable();
            $table->text('print')->nullable();
            $table->text('deleted_at')->date()->nullable();
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
        Schema::dropIfExists('scores');
    }
}
