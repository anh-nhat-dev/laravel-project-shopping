<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('images', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_ref')->unsigned();
                $table->string('link');
                $table->enum('type',['thumbnail', 'gallery']);
                $table->enum('zone', ['product', 'category', 'user']);
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
        Schema::dropIfExists('images');
    }
}
