<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('barcode')->unique()->nullable();
            $table->text('details')->nullable();
            $table->boolean('available')->default(true);
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('quantity');
            $table->decimal('head_price')->nullable();
            $table->unsignedBigInteger('head_price_currency_id')->nullable();
            $table->decimal('price')->nullable();
            $table->unsignedBigInteger('price_currency_id')->nullable();
            $table->unsignedBigInteger('sale_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable()->onDelete('cascade');

            $table->timestamps();

            $table->foreign('head_price_currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('price_currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('sale_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('collections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collections', function($table)
        {
            $table->dropForeign(['head_price_currency_id', 'price_currency_id', 'sale_id', 'user_id', 'parent_id']);
        });

        Schema::dropIfExists('collections');
    }
}
