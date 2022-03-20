<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAuditDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_details', function (Blueprint $table) {

            $table->string('audit_id');
            $table->string('order_id');

            $table->foreign('audit_id')->references('audit_id')->on('audits');
            $table->foreign('order_id')->references('order_id')->on('orders');
        });

        DB::table('audit_details')->insert([
            ['audit_id' => 'AU001', 'order_id' => 'OR001'],
            ['audit_id' => 'AU002', 'order_id' => 'OR002'],
            ['audit_id' => 'AU003', 'order_id' => 'OR003'],
            ['audit_id' => 'AU004', 'order_id' => 'OR004'],
            ['audit_id' => 'AU005', 'order_id' => 'OR005']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_details');
    }
}