<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->decimal('balance', 10, 2);
            $table->timestamps();
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alias');
            $table->integer('total_amount');
            $table->decimal('init_price', 10, 2);
            $table->timestamps();
        });

        Schema::create('order_buys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('stock_id');
            $table->integer('amount_remain');
            $table->integer('amount_executed');
            $table->decimal('price', 10, 2);
            $table->timestamp('cancel_at');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
        });

        Schema::create('order_sells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('stock_id');
            $table->integer('amount_remain');
            $table->integer('amount_executed');
            $table->decimal('price', 10, 2);
            $table->timestamp('cancel_at');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_buys_id');
            $table->unsignedBigInteger('order_sells_id');
            $table->integer('amount');
            $table->decimal('price', 10, 2);
            $table->timestamps();
            $table->foreign('order_buys_id')->references('id')->on('order_buys')->onDelete('cascade');
            $table->foreign('order_sells_id')->references('id')->on('order_sells')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('order_buys');
        Schema::dropIfExists('order_sells');
        Schema::dropIfExists('transactions');
    }
}
