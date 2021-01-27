<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToCarts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::table('carts', function($table) {
            $table->date('order_date')->nullable();
            $table->date('arrived_date')->nullable();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
        Schema::table('carts', function($table) {
            $table->dropColum('order_date');
            $table->dropColum('arrived_date');
        });
        */
    }
}
