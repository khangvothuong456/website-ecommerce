<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_cate')->unsigned();
            $table->foreign('id_cate')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('name_url');
            $table->string('color');
            $table->integer('price');
            $table->integer('qty');
            $table->string('image_link');
            $table->string('image_list')->nullable();
            $table->longText('description');
            $table->boolean('status');
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
        Schema::dropIfExists('products');
    }
}
