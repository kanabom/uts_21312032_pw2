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
        Schema::create('21312032_uts1', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('uts2_f1');
            $table->text('uts2_f2');
            $table->text('uts2_f3');
            $table->text('uts2_f4');
            $table->unsignedBigInteger('21312032_uts1_id');
            $table->foreign('21312032_uts1_id')->references('id')->on('21312032_uts1');
            $table->unsignedBigInteger('21312032_uts3_id');
            $table->foreign('21312032_uts3_id')->references('id')->on('21312032_uts3');
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
        Schema::dropIfExists('21312032_uts2');
    }
};
