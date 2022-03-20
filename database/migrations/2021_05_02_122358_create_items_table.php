<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->string('item_id')->unique()->onDelete('cascade');
            $table->string('vendor_id');
            $table->string('item_name');
            $table->string('item_brand');
            $table->double('item_price', 8, 2);
            $table->integer('item_stock_qty');

            $table->primary('item_id');
            $table->foreign('vendor_id')->references('vendor_id')->on('vendors');
        });

        DB::table('items')->insert([
            ['item_id' => 'IT001', 'vendor_id' => 'VE001', 'item_name' => 'Red Pen', 'item_brand' => 'Stabilo', 'item_price' => 1.50, 'item_stock_qty' => 12],
            ['item_id' => 'IT002', 'vendor_id' => 'VE001', 'item_name' => 'Blue Pen', 'item_brand' => 'Faber Castell', 'item_price' => 1.90, 'item_stock_qty' => 40],
            ['item_id' => 'IT003', 'vendor_id' => 'VE001', 'item_name' => 'Black Pen', 'item_brand' => 'Pilot', 'item_price' => 4.00, 'item_stock_qty' => 300],
            ['item_id' => 'IT004', 'vendor_id' => 'VE002', 'item_name' => 'Yellow Highlighter', 'item_brand' => 'Pilot', 'item_price' => 6.00, 'item_stock_qty' => 50],
            ['item_id' => 'IT005', 'vendor_id' => 'VE002', 'item_name' => 'Sharpener', 'item_brand' => 'Generic', 'item_price' => 0.50, 'item_stock_qty' => 50],
            ['item_id' => 'IT006', 'vendor_id' => 'VE002', 'item_name' => '2B Pencil', 'item_brand' => 'Stabilo', 'item_price' => 0.70, 'item_stock_qty' => 10],
            ['item_id' => 'IT007', 'vendor_id' => 'VE003', 'item_name' => 'Permanent marker', 'item_brand' => 'Pilot', 'item_price' => 2.90, 'item_stock_qty' => 38],
            ['item_id' => 'IT008', 'vendor_id' => 'VE003', 'item_name' => 'Black Whiteboard Marker', 'item_brand' => 'Pilot', 'item_price' => 3.00, 'item_stock_qty' => 26],
            ['item_id' => 'IT009', 'vendor_id' => 'VE003', 'item_name' => 'Eraser', 'item_brand' => 'Pilot', 'item_price' => 1.50, 'item_stock_qty' => 100],
            ['item_id' => 'IT010', 'vendor_id' => 'VE004', 'item_name' => 'Liquid Paper', 'item_brand' => 'Staedtler', 'item_price' => 4.00, 'item_stock_qty' => 90],
            ['item_id' => 'IT011', 'vendor_id' => 'VE004', 'item_name' => 'Pencil Lead', 'item_brand' => 'Pilot', 'item_price' => 0.90, 'item_stock_qty' => 90],
            ['item_id' => 'IT012', 'vendor_id' => 'VE004', 'item_name' => 'A4 Paper (Ream)', 'item_brand' => 'Double A Paper', 'item_price' => 12.00, 'item_stock_qty' => 100],
            ['item_id' => 'IT013', 'vendor_id' => 'VE005', 'item_name' => 'Notebooks', 'item_brand' => 'Faber Castell', 'item_price' => 5.90, 'item_stock_qty' => 40],
            ['item_id' => 'IT014', 'vendor_id' => 'VE005', 'item_name' => 'Foolscap Paper', 'item_brand' => 'UNI', 'item_price' => 6.50, 'item_stock_qty' => 40],
            ['item_id' => 'IT015', 'vendor_id' => 'VE005', 'item_name' => 'Glue', 'item_brand' => 'Astar', 'item_price' => 2.30, 'item_stock_qty' => 40],
            ['item_id' => 'IT016', 'vendor_id' => 'VE006', 'item_name' => 'Paper Clip (Box)', 'item_brand' => 'Astar', 'item_price' => 2.00, 'item_stock_qty' => 100],
            ['item_id' => 'IT017', 'vendor_id' => 'VE006', 'item_name' => 'Printer Catridge (Color)', 'item_brand' => 'Canon', 'item_price' => 20.00, 'item_stock_qty' => 50],
            ['item_id' => 'IT018', 'vendor_id' => 'VE006', 'item_name' => 'Printer Catridge (Black)', 'item_brand' => 'Canon', 'item_price' => 20.00, 'item_stock_qty' => 50],
            ['item_id' => 'IT019', 'vendor_id' => 'VE007', 'item_name' => 'Stapler', 'item_brand' => 'MAX', 'item_price' => 7.90, 'item_stock_qty' => 90],
            ['item_id' => 'IT020', 'vendor_id' => 'VE007', 'item_name' => 'Staples (Box)', 'item_brand' => 'MAX', 'item_price' => 2.80, 'item_stock_qty' => 230],
            ['item_id' => 'IT021', 'vendor_id' => 'VE007', 'item_name' => 'Rubber Band (Packet)', 'item_brand' => 'Malaysia Rubber', 'item_price' => 4.00, 'item_stock_qty' => 60],
            ['item_id' => 'IT022', 'vendor_id' => 'VE008', 'item_name' => 'Manila Folder', 'item_brand' => 'Astar', 'item_price' => 2.00, 'item_stock_qty' => 130],
            ['item_id' => 'IT023', 'vendor_id' => 'VE008', 'item_name' => 'Plastic File', 'item_brand' => 'Astar', 'item_price' => 1.00, 'item_stock_qty' => 130],
            ['item_id' => 'IT024', 'vendor_id' => 'VE009', 'item_name' => 'Arch Folder (2 Ring)', 'item_brand' => 'Asia File', 'item_price' => 3.00, 'item_stock_qty' => 100],
            ['item_id' => 'IT025', 'vendor_id' => 'VE009', 'item_name' => 'Sticky Notes', 'item_brand' => '3M', 'item_price' => 4.40, 'item_stock_qty' => 100],
            ['item_id' => 'IT026', 'vendor_id' => 'VE010', 'item_name' => 'Pen Knife', 'item_brand' => '3M', 'item_price' =>  2.50, 'item_stock_qty' => 60],
            ['item_id' => 'IT027', 'vendor_id' => 'VE010', 'item_name' => 'Tissue (Roll)', 'item_brand' => 'Kleenex', 'item_price' => 5.00, 'item_stock_qty' => 55],
            ['item_id' => 'IT028', 'vendor_id' => 'VE010', 'item_name' => 'Bottled Water', 'item_brand' => 'Evian', 'item_price' => 1.50, 'item_stock_qty' => 300],
            ['item_id' => 'IT029', 'vendor_id' => 'VE010', 'item_name' => 'Scissors', 'item_brand' => 'Faber Castell', 'item_price' => 3.00, 'item_stock_qty' => 60],
            ['item_id' => 'IT030', 'vendor_id' => 'VE010', 'item_name' => 'Nescafe 3 in 1 (Packet)', 'item_brand' => 'Nestle', 'item_price' => 12.30, 'item_stock_qty' => 200]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}