<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProAttrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_attrs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pro')->unsigned();
            $table->foreign('id_pro')->references('id')->on('products')->onDelete('cascade');
            $table->string('size');
            $table->integer('price');
            $table->integer('qty');
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
        Schema::dropIfExists('pro_attrs');
    }
}
