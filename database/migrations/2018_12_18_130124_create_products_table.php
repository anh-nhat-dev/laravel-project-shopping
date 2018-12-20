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
            $table->string('name');
            $table->string('slug');
            $table->integer('sale_price')->default(0);
            $table->integer('price')->default(0);
            $table->enum('is_sale', ['true','false'])->default('false');
            $table->enum('status', ['public','draff'])->default('draff');
            $table->longText('description')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('categories_id')->unsigned();
            $table->float('total_star')->default(0.0);
            $table->enum('is_future', ['true','false'])->default('false');
            $table->timestamps();

            $table->foreign('categories_id')
                ->references('id')
                ->on('categories');
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
