<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {

            $table->string('vendor_id')->unique();
            $table->string('vendor_name');
            $table->string('vendor_hp');
            $table->string('vendor_email');
            $table->string('vendor_company');

            $table->primary('vendor_id');
        });

        DB::table('vendors')->insert([
            ['vendor_id' => 'VE001', 'vendor_name' => 'Eric Lim', 'vendor_hp' => '0168640325', 'vendor_email' => 'ericlim@gmail.com', 'vendor_company' => 'Big Stationary Sdn. Bhd.'],
            ['vendor_id' => 'VE002', 'vendor_name' => 'Peter Tan', 'vendor_hp' => '0104075468', 'vendor_email' => 'petertan@gmail.com', 'vendor_company' => 'Jaymart Stationery Sdn. Bhd'],
            ['vendor_id' => 'VE003', 'vendor_name' => 'Jeff Lee', 'vendor_hp' => '01135385147', 'vendor_email' => 'jefflee@hotmail.com', 'vendor_company' => 'First Million Stationery Sdn. Bhd'],
            ['vendor_id' => 'VE004', 'vendor_name' => 'Alvin Ng', 'vendor_hp' => '0185462184', 'vendor_email' => 'alvinng@gmail.com', 'vendor_company' => 'Unicorn Stationery Sdn. Bhd'],
            ['vendor_id' => 'VE005', 'vendor_name' => 'Eric Ong', 'vendor_hp' => '0135426852', 'vendor_email' => 'ericong@hotmail.com', 'vendor_company' => 'Sky Sky Stationery Sdn. Bhd'],
            ['vendor_id' => 'VE006', 'vendor_name' => 'Alex Ang', 'vendor_hp' => '0187964264', 'vendor_email' => 'alexang@gmail.com', 'vendor_company' => 'LX Stationery Sdn. Bhd'],
            ['vendor_id' => 'VE007', 'vendor_name' => 'Kelvin Lin', 'vendor_hp' => '0104068549', 'vendor_email' => 'kelvinlin@hotmail.com', 'vendor_company' => 'YY Stationery Trading'],
            ['vendor_id' => 'VE008', 'vendor_name' => 'Nicholas Teh', 'vendor_hp' => '0139498795', 'vendor_email' => 'nicholasteh@gmail.com', 'vendor_company' => 'July Stationery Trading'],
            ['vendor_id' => 'VE009', 'vendor_name' => 'John Chen', 'vendor_hp' => '0146987520', 'vendor_email' => 'johnchen@hotmail.com', 'vendor_company' => 'John Stationery Trading'],
            ['vendor_id' => 'VE010', 'vendor_name' => 'James Eng', 'vendor_hp' => '0135874468', 'vendor_email' => 'jameseng@gmail.com', 'vendor_company' => 'TYW Stationery Trading']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}