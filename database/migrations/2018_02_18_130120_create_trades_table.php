<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pair_id');
            $table->foreign('pair_id')->references('id')->on('market_pair')->onDelete('cascade');
            $table->unsignedInteger('asker_id');
            $table->foreign('asker_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('bidder_id');
            $table->foreign('bidder_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('type', ['ASK', 'BID']);
            $table->decimal('amount', 16, 8);
            $table->decimal('price', 16, 8);
            $table->decimal('ask_fee', 16, 8);
            $table->decimal('bid_fee', 16, 8);
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
        Schema::dropIfExists('trades');
    }
}
