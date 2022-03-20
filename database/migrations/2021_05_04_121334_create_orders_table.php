<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('order_id')->unique();
            $table->string('staff_id');
            $table->double('total_price', 8, 2);
            $table->string('order_status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('staff_id')->references('staff_id')->on('users');
        });

        DB::table('orders')->insert([
            ['order_id' => 'OR001', 'staff_id' => 'AD001', 'total_price' => '1491.00', 'order_status' => 'Order Completed', 'created_at' => '2020-02-05 12:50:08', 'updated_at' => '2020-02-09 13:20:37'],
            ['order_id' => 'OR002', 'staff_id' => 'AD001', 'total_price' => '804.00', 'order_status' => 'Order Completed', 'created_at' => '2020-05-06 15:40:13', 'updated_at' => '2020-05-10 11:33:15'],
            ['order_id' => 'OR003', 'staff_id' => 'AD001', 'total_price' => '576.00', 'order_status' => 'Order Completed', 'created_at' => '2020-08-11 14:35:47', 'updated_at' => '2020-08-15 11:57:43'],
            ['order_id' => 'OR004', 'staff_id' => 'AD001', 'total_price' => '2225.00', 'order_status' => 'Order Completed', 'created_at' => '2020-11-03 13:17:39', 'updated_at' => '2020-11-07 13:32:28'],
            ['order_id' => 'OR005', 'staff_id' => 'AD001', 'total_price' => '1388.00', 'order_status' => 'Order Completed', 'created_at' => '2021-02-02 15:15:34', 'updated_at' => '2021-02-06 13:12:07']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}