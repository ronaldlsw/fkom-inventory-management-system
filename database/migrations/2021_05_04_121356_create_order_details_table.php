<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {

            $table->id();

            $table->string('order_id');
            $table->string('item_id');
            $table->integer('order_qty');
            $table->double('item_total_price', 8, 2);

            $table->foreign('order_id')->references('order_id')->on('orders');
            $table->foreign('item_id')->references('item_id')->on('items');
        });

        DB::table('order_details')->insert([
            ['order_id' => 'OR001', 'item_id' => 'IT002', 'order_qty' => 50, 'item_total_price' => 95.00],
            ['order_id' => 'OR002', 'item_id' => 'IT001', 'order_qty' => 20, 'item_total_price' => 75.00],
            ['order_id' => 'OR003', 'item_id' => 'IT002', 'order_qty' => 30, 'item_total_price' => 57.00],
            ['order_id' => 'OR004', 'item_id' => 'IT003', 'order_qty' => 30, 'item_total_price' => 120.00],
            ['order_id' => 'OR005', 'item_id' => 'IT004', 'order_qty' => 50, 'item_total_price' => 300.00],
            ['order_id' => 'OR001', 'item_id' => 'IT005', 'order_qty' => 50, 'item_total_price' => 25.00],
            ['order_id' => 'OR003', 'item_id' => 'IT006', 'order_qty' => 50, 'item_total_price' => 35.00],
            ['order_id' => 'OR002', 'item_id' => 'IT007', 'order_qty' => 50, 'item_total_price' => 145.00],
            ['order_id' => 'OR005', 'item_id' => 'IT008', 'order_qty' => 20, 'item_total_price' => 60.00],
            ['order_id' => 'OR004', 'item_id' => 'IT009', 'order_qty' => 70, 'item_total_price' => 105.00],
            ['order_id' => 'OR001', 'item_id' => 'IT010', 'order_qty' => 90, 'item_total_price' => 360.00],
            ['order_id' => 'OR001', 'item_id' => 'IT011', 'order_qty' => 60, 'item_total_price' => 54.00],
            ['order_id' => 'OR005', 'item_id' => 'IT012', 'order_qty' => 30, 'item_total_price' => 360.00],
            ['order_id' => 'OR005', 'item_id' => 'IT013', 'order_qty' => 40, 'item_total_price' => 236.00],
            ['order_id' => 'OR005', 'item_id' => 'IT014', 'order_qty' => 40, 'item_total_price' => 260.00],
            ['order_id' => 'OR005', 'item_id' => 'IT015', 'order_qty' => 40, 'item_total_price' => 92.00],
            ['order_id' => 'OR005', 'item_id' => 'IT016', 'order_qty' => 40, 'item_total_price' => 80.00],
            ['order_id' => 'OR004', 'item_id' => 'IT017', 'order_qty' => 50, 'item_total_price' => 1000.00],
            ['order_id' => 'OR004', 'item_id' => 'IT018', 'order_qty' => 50, 'item_total_price' => 1000.00],
            ['order_id' => 'OR001', 'item_id' => 'IT019', 'order_qty' => 70, 'item_total_price' => 553.00],
            ['order_id' => 'OR001', 'item_id' => 'IT020', 'order_qty' => 80, 'item_total_price' => 224.00],
            ['order_id' => 'OR002', 'item_id' => 'IT021', 'order_qty' => 60, 'item_total_price' => 240.00],
            ['order_id' => 'OR003', 'item_id' => 'IT022', 'order_qty' => 60, 'item_total_price' => 12.00],
            ['order_id' => 'OR003', 'item_id' => 'IT023', 'order_qty' => 80, 'item_total_price' => 8.00],
            ['order_id' => 'OR003', 'item_id' => 'IT024', 'order_qty' => 90, 'item_total_price' => 270.00],
            ['order_id' => 'OR003', 'item_id' => 'IT025', 'order_qty' => 10, 'item_total_price' => 44.00],
            ['order_id' => 'OR003', 'item_id' => 'IT026', 'order_qty' => 60, 'item_total_price' => 150.00],
            ['order_id' => 'OR002', 'item_id' => 'IT027', 'order_qty' => 55, 'item_total_price' => 275.00],
            ['order_id' => 'OR002', 'item_id' => 'IT028', 'order_qty' => 30, 'item_total_price' => 45.00],
            ['order_id' => 'OR001', 'item_id' => 'IT029', 'order_qty' => 60, 'item_total_price' => 180.00],
            ['order_id' => 'OR002', 'item_id' => 'IT030', 'order_qty' => 20, 'item_total_price' => 24.00]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}