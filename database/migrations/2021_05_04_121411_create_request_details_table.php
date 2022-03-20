<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRequestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_details', function (Blueprint $table) {

            $table->id();

            $table->string('req_id');
            $table->string('item_id');
            $table->integer('req_qty');

            $table->foreign('req_id')->references('req_id')->on('requests');
            $table->foreign('item_id')->references('item_id')->on('items');
        });

        DB::table('request_details')->insert([
            ['req_id' => 'RQ001', 'item_id' => 'IT001', 'req_qty' => 2],
            ['req_id' => 'RQ002', 'item_id' => 'IT002', 'req_qty' => 2],
            ['req_id' => 'RQ003', 'item_id' => 'IT003', 'req_qty' => 3],
            ['req_id' => 'RQ004', 'item_id' => 'IT004', 'req_qty' => 1],
            ['req_id' => 'RQ005', 'item_id' => 'IT005', 'req_qty' => 2],
            ['req_id' => 'RQ001', 'item_id' => 'IT006', 'req_qty' => 2],
            ['req_id' => 'RQ002', 'item_id' => 'IT007', 'req_qty' => 6],
            ['req_id' => 'RQ003', 'item_id' => 'IT008', 'req_qty' => 3],
            ['req_id' => 'RQ004', 'item_id' => 'IT009', 'req_qty' => 2],
            ['req_id' => 'RQ005', 'item_id' => 'IT010', 'req_qty' => 1],
            ['req_id' => 'RQ001', 'item_id' => 'IT011', 'req_qty' => 5],
            ['req_id' => 'RQ002', 'item_id' => 'IT012', 'req_qty' => 1],
            ['req_id' => 'RQ003', 'item_id' => 'IT013', 'req_qty' => 2],
            ['req_id' => 'RQ004', 'item_id' => 'IT014', 'req_qty' => 5],
            ['req_id' => 'RQ005', 'item_id' => 'IT015', 'req_qty' => 5],
            ['req_id' => 'RQ001', 'item_id' => 'IT016', 'req_qty' => 1],
            ['req_id' => 'RQ002', 'item_id' => 'IT017', 'req_qty' => 3],
            ['req_id' => 'RQ003', 'item_id' => 'IT018', 'req_qty' => 1],
            ['req_id' => 'RQ004', 'item_id' => 'IT019', 'req_qty' => 2],
            ['req_id' => 'RQ004', 'item_id' => 'IT020', 'req_qty' => 1],
            ['req_id' => 'RQ005', 'item_id' => 'IT021', 'req_qty' => 2],
            ['req_id' => 'RQ005', 'item_id' => 'IT022', 'req_qty' => 4],
            ['req_id' => 'RQ001', 'item_id' => 'IT023', 'req_qty' => 3],
            ['req_id' => 'RQ002', 'item_id' => 'IT024', 'req_qty' => 3],
            ['req_id' => 'RQ001', 'item_id' => 'IT025', 'req_qty' => 1],
            ['req_id' => 'RQ002', 'item_id' => 'IT026', 'req_qty' => 4],
            ['req_id' => 'RQ003', 'item_id' => 'IT027', 'req_qty' => 3],
            ['req_id' => 'RQ006', 'item_id' => 'IT028', 'req_qty' => 2],
            ['req_id' => 'RQ006', 'item_id' => 'IT029', 'req_qty' => 1],
            ['req_id' => 'RQ006', 'item_id' => 'IT030', 'req_qty' => 2]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_details');
    }
}