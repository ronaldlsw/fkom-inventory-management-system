<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {

            $table->string('audit_id')->unique();
            $table->string('months');
            $table->integer('year');

            $table->primary('audit_id');
        });

        DB::table('audits')->insert([
            ['audit_id' => 'AU001', 'months' => 'Jan-Mar', 'year' => 2020],
            ['audit_id' => 'AU002', 'months' => 'Apr-June', 'year' => 2020],
            ['audit_id' => 'AU003', 'months' => 'July-Sep', 'year' => 2020],
            ['audit_id' => 'AU004', 'months' => 'Oct-Dec', 'year' => 2020],
            ['audit_id' => 'AU005', 'months' => ' Jan-Mar', 'year' => 2021]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audits');
    }
}