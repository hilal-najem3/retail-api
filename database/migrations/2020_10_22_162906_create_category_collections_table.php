<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_collections', function (Blueprint $table) {
            $table->unsignedBigInteger('collection_id')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->nullable()->onDelete('cascade');

            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('collections');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_collections', function($table)
        {
            $table->dropForeign(['collection_id', 'category_id']);
        });

        Schema::dropIfExists('category_collections');
    }
}
