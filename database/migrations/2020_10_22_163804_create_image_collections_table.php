<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_collections', function (Blueprint $table) {
            $table->unsignedBigInteger('collection_id')->nullable()->onDelete('cascade');
            $table->unsignedBigInteger('image_id')->nullable()->onDelete('cascade');

            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('collections');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_collections', function($table)
        {
            $table->dropForeign(['collection_id', 'image_id']);
        });

        Schema::dropIfExists('image_collections');
    }
}
