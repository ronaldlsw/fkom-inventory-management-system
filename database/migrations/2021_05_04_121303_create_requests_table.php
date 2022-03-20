<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {

            $table->string('req_id')->unique();
            $table->string('staff_id');
            $table->string('req_status');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->primary('req_id');
            $table->foreign('staff_id')->references('staff_id')->on('users');
        });

        DB::table('requests')->insert([
            ['req_id' => 'RQ001', 'staff_id' => 'ST001', 'created_at' => '2021-02-06 15:25:43', 'updated_at' => '2021-02-07 07:20:11', 'req_status' => 'Approved'],
            ['req_id' => 'RQ002', 'staff_id' => 'ST002', 'created_at' => '2021-02-08 13:30:24', 'updated_at' => '2021-02-09 07:07:34', 'req_status' => 'Approved'],
            ['req_id' => 'RQ003', 'staff_id' => 'ST003', 'created_at' => '2021-02-08 15:43:10', 'updated_at' => '2021-02-09 07:08:04', 'req_status' => 'Approved'],
            ['req_id' => 'RQ004', 'staff_id' => 'ST004', 'created_at' => '2021-02-10 15:25:18', 'updated_at' => '2021-02-11 07:15:23', 'req_status' => 'Approved'],
            ['req_id' => 'RQ005', 'staff_id' => 'ST005', 'created_at' => '2021-02-11 14:25:45', 'updated_at' => '2021-02-12 07:05:34', 'req_status' => 'Approved'],
            ['req_id' => 'RQ006', 'staff_id' => 'ST001', 'created_at' => '2021-02-12 15:25:18', 'updated_at' => '2021-02-18 07:10:32', 'req_status' => 'Approved']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}