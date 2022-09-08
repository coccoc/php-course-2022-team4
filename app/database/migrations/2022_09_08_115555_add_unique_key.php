<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->unique('name');
            $table->unique('username');
        });

        Schema::table('stocks', function (Blueprint $table) {
            $table->unique('name');
            $table->unique('alias');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->unique(['order_buys_id', 'order_sells_id']);});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropUnique('name');
            $table->dropUnique('username');
        });

        Schema::table('stocks', function (Blueprint $table) {
            $table->dropUnique('name');
            $table->dropUnique('alias');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->dropUnique(['order_buys_id', 'order_sells_id']);});
    }
}
