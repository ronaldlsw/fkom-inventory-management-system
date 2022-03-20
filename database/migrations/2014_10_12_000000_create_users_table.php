<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->string('staff_id')->unique();
            $table->string('name');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('position');
            $table->rememberToken();
            $table->primary('staff_id');
        });
        //kianfei01
        //leeyee02
        //yiwee03
        //cheekin04
        //chris01
        //ronald05
        DB::table('users')->insert([
            ['staff_id' => 'ST001', 'name' => 'Chin Kian Fei', 'contact' => '0123445943', 'email' => 'kianfei@gmail.com', 'password' => '$2y$10$H/d36fdrJT8nUitItkbRruqVIu.sd9Zfp1LHFnMJfn.537v.JSl9a', 'position' => 'Staff'],
            ['staff_id' => 'ST002', 'name' => 'Shia Lee Yee', 'contact' => '0160083192', 'email' => 'leeyee@outlook.com', 'password' => '$2y$10$htHkR0IjnVdhr9BijJ6zZObWG2/bDy3177.5sUVnDf2tCKVNYJTFC', 'position' => 'Staff'],
            ['staff_id' => 'ST003', 'name' => 'Tan Yi Wee', 'contact' => '0175136689', 'email' => 'yiwee@hotmail.com', 'password' => '$2y$10$dOubOHzwietK40rez2GzhOcdyoWrUKMM3KEW30MqCcOS1/Av8shR6', 'position' => 'Staff'],
            ['staff_id' => 'ST004', 'name' => 'Tan Chee Kin', 'contact' => '0121997653', 'email' => 'cheekin@gmail.com', 'password' => '$2y$10$9E/5cqqN.9BaAyTj6RQgBu2eKJiEtJEL1oUe8KYqTw.kv4phhW42y', 'position' => 'Staff'],
            ['staff_id' => 'ST005', 'name' => 'Ronald Lim Sheng Wei', 'contact' => '0168210692', 'email' => 'ronaldlim@outlook.com', 'password' => '$2y$10$ct.r/WAx.hPNirylU7WE7e6IzWNsGwyO57/VNYqE2k.v0UJwHmR0O', 'position' => 'Staff'],
            ['staff_id' => 'AD001', 'name' => 'Chris Johnson', 'contact' => '0176534492', 'email' => 'chris@hotmail.com', 'password' => '$2y$10$7dNfj/ofskkTCwLJrR/Cw.CAdgT93CMNXT.o4TfAjzx57a7NbxDji', 'position' => 'Admin'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}