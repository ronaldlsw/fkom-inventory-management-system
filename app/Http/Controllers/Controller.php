<?php

namespace App\Http\Controllers;

use App\Models\Audit_details;
use App\Models\Audits;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\requests;
use App\Models\request_details;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use App\Models\Item;
use App\Models\Order;
use App\Models\Order_cart;
use App\Models\Order_detail;
use Illuminate\Contracts\Session\Session;
use App\Models\Request_detail;
use App\Models\Vendor;
use Carbon\Carbon;





class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //INTRO CONTROLLER----------------------------------------------------------------------------
    public function welcome()
    {
        return view('main_menu.welcome');
    }
    public function staffHomeIndex()
    {
        $id = Auth::user();
        return view('main_menu.index_staff');
    }
    public function adminHomeIndex()
    {
        $id = Auth::user();
        return view('main_menu.index_admin');
    }

    //MANAGE NEW STOCK ORDER CONTROLLER----------------------------------------------------------------------------
    public function mngStockIndex() //When Admin Access Manage New Stock Module
    {
        return view('mng_Stock.Order.orderIndex');
    }

    public function mngStockitemList() //View Item List
    {
        $results = DB::table('items')->join('vendors', 'items.vendor_id', '=', 'vendors.vendor_id')->select('items.*', 'vendors.vendor_name', 'vendors.vendor_company')->get();
        $a = 1;

        return view('mng_Stock.Item.itemList', ['datas' => $results, 'a' => $a]);
    }

    public function mngStockorderCart() //View Order Cart
    {
        $results = DB::table('order_carts')->join('items', 'order_carts.item_id', '=', 'items.item_id')->join('vendors', 'items.vendor_id', '=', 'vendors.vendor_id')->select('order_carts.item_id', 'items.item_name', 'items.item_stock_qty', 'items.item_price', 'vendors.vendor_name', 'vendors.vendor_hp', 'vendors.vendor_email')->get();
        $a = 1;

        return view('mng_Stock.Order.orderCart', ['datas' => $results, 'a' => $a]);
    }

    public function mngStockorderRec() //View Order Records
    {
        $results = DB::table('orders')->join('users', 'orders.staff_id', '=', 'users.staff_id')->select('orders.*', 'users.staff_id', 'users.name')->get();

        return view('mng_Stock.Order.orderRec', ['datas' => $results]);
    }

    public function mngStockorderDet($id) //View Order Record Details
    {
        $base = DB::table('orders')->join('users', 'orders.staff_id', '=', 'users.staff_id')->select('orders.order_id', 'orders.total_price', 'orders.order_status', 'orders.created_at', 'users.staff_id', 'users.name')->where('orders.order_id', '=', $id)->get();
        $results = DB::table('orders')->join('order_details', 'orders.order_id', '=', 'order_details.order_id')->join('items', 'order_details.item_id', '=', 'items.item_id')->join('vendors', 'items.vendor_id', '=', 'vendors.vendor_id')->select('order_details.order_qty', 'order_details.item_total_price', 'items.item_id', 'items.item_name', 'items.item_price', 'vendors.vendor_id', 'vendors.vendor_name', 'vendors.vendor_company')->where('orders.order_id', '=', $id)->orderBy('items.item_id', 'asc')->get();
        $a = 1;

        return view('mng_Stock.Order.orderDet', ['base' => $base, 'datas' => $results, 'a' => $a]);
    }

    public function mngStockupdateOrder($id) //Update Order Status
    {
        $base = DB::table('orders')->join('users', 'orders.staff_id', '=', 'users.staff_id')->select('orders.order_id', 'orders.total_price', 'orders.created_at', 'users.staff_id', 'users.name')->where('orders.order_id', '=', $id)->get();
        $results = DB::table('orders')->join('order_details', 'orders.order_id', '=', 'order_details.order_id')->join('items', 'order_details.item_id', '=', 'items.item_id')->join('vendors', 'items.vendor_id', '=', 'vendors.vendor_id')->select('order_details.order_qty', 'order_details.item_total_price', 'items.item_id', 'items.item_name', 'items.item_price', 'vendors.vendor_id', 'vendors.vendor_name', 'vendors.vendor_company')->where('orders.order_id', '=', $id)->orderBy('items.item_id', 'asc')->get();

        $a = 1;

        return view('mng_Stock.Order.updateOrder', ['base' => $base, 'datas' => $results, 'a' => $a]);
    }

    public function mngStockstoreOrder(request $req) //Save Order Cart's Data as a New Order in orders and order_details Table
    {
        $currentid = auth()->user()->staff_id;
        $num = count($req->item_id);
        $ids = $req->input('item_id', []);
        $qty = $req->input('order_qty', []);
        $itemTotal = $req->input('item_total_price', []);
        $overallPrice = $req->input('totalPrice');

        $res = DB::table('orders')->select('id')->orderBy('id', 'desc')->first();
        $rs = $res->id + 1;
        $new_id = sprintf("%03d", $rs);
        $order_id = "OR" . $new_id;
        DB::table('orders')->insert(
            [
                'order_id' => $order_id,
                'staff_id' => $currentid,
                'order_status' => "Order Sent",
                'total_price' => $overallPrice,
                "created_at" =>  \Carbon\Carbon::now()
            ]
        );
        for ($i = 0; $i < $num; $i++) {
            DB::table('order_details')->insert(
                [
                    'order_id' => $order_id,
                    'item_id' => $ids[$i],
                    'order_qty' => $qty[$i],
                    'item_total_price' => $itemTotal[$i]
                ]
            );
        }

        DB::table('order_carts')->delete();


        return redirect('/mngNewStck/orderRec');
    }

    public function mngStockupdateCart(request $req) //Executed When Admin Added Item(s) from Item List to Order Cart
    {
        $num = count($req->item_id);
        $ids = $req->input('item_id', []);

        for ($i = 0; $i < $num; $i++) {
            DB::table('order_carts')->insertOrIgnore(
                [
                    'item_id' => $ids[$i]
                ]
            );
        }
        return redirect('/mngNewStck/orderCart');
    }

    public function mngStockdelCartItem($item_id) //Executed When Admin Remove Item from Order Cart
    {
        $item = Order_cart::find($item_id);
        $item->delete();

        return redirect('/mngNewStck/orderCart');
    }

    public function mngStockstoreOrderUpdate(request $req) //Update The Status of an Order
    {
        $order = Order::find($req->order_id);

        if ($req->status == "Order Completed" && $order->order_status == "Order Sent") {
            $ids = DB::table('order_details')->select('item_id')->where('order_id', '=', $req->order_id)->get();
            foreach ($ids as $id) {
                $ord_qty = DB::table('order_details')->where('order_id', '=', $req->order_id)->where('item_id', '=', $id->item_id)->value('order_qty');
                $inven = Item::find($id->item_id);
                $inven->item_stock_qty = $inven->item_stock_qty + $ord_qty;
                $inven->save();
            }
        }
        $order->order_status = $req->status;
        $order->save();

        return redirect('/mngNewStck/orderRec');
    }

    //ITEM APPROVAL CONTROLLER----------------------------------------------------------------------------
    public function approveIndex()
    {
        $users = DB::table('users')
            ->join('requests', 'users.staff_id', '=', 'requests.staff_id')
            ->select('users.*', 'requests.req_id', 'requests.created_at')
            //->where('requests.req_status', '=', 'Not approved')
            ->get();
        return view('item_approvals.userlist', ['staffinfo' => $users]);
    }


    public function approveShow($id)
    {
        $request = DB::table('requests')
            ->join('users', 'requests.staff_id', '=', 'users.staff_id')
            ->select('requests.*', 'users.name', 'users.staff_id')
            ->where('requests.req_id', '=', $id)->get();

        $datas = DB::table('requests')
            ->join('request_details', 'requests.req_id', '=', 'request_details.req_id')
            ->join('items', 'request_details.item_id', '=', 'items.item_id')
            ->select('requests.req_id', 'request_details.req_qty', 'items.item_name', 'items.item_id')
            ->where('request_details.req_id', '=', $id)->get();
        $a = 1;

        return view('item_approvals.itemApp', ['request' => $request, 'datas' => $datas, 'a' => $a]);
    }

    public function approveDelete($req_id, $id)
    {
        $item = DB::table("request_details")->where('req_id', '=', $req_id)->where('item_id', '=', $id)->delete();

        return redirect('/item_approvals/userList');
    }

    public function approveItem($req_id, request $data)
    {
        $num = count($data->item_id);
        $ids = $data->input('item_id', []);
        $qty = $data->input('req_qty', []);
        $item = DB::table("request_details")->where('req_id', '=', $req_id)->delete();

        for ($i = 0; $i < $num; $i++) {
            DB::table('request_details')->insert(
                [
                    'req_id' => $req_id,
                    'item_id' => $ids[$i],
                    'req_qty' => $qty[$i],
                ]
            );
        }



        return redirect('/item_approvals/userList');
    }

    //MANAGE STOCK LIST CONTROLLER----------------------------------------------------------------------------
    public function stockIndex()
    {
        //Query all item data.
        $data = Item::all();
        return view('stocks.stockIndex', ['items' => $data]);
    }


    public function stockShow($item_id)
    {
        //Find row with $item_id from database
        $items = Item::findOrFail($item_id);

        //Query all vendor data
        $vendor = Vendor::all();
        return view('stocks.stockShow', ['items' => $items], ['vendors' => $vendor]);
    }


    public function stockCreate()
    {
        //Create id naming
        $itemid = Item::count() + 1;
        if ($itemid <= 99) {
            $itemid = "IT0" . $itemid;
        } else {
            $itemid = "IT" . $itemid;
        }

        //Query all vendor info
        $vendorinfo = Vendor::all();
        return view('stocks.stockCreate', ['itemid' => $itemid], ['vendors' => $vendorinfo]);
    }

    public function stockUpdate()
    {
        //Get item data from interface
        $item_id = request('item_id');
        $vendor_id = request('vendor_id');
        $item_name = request('item_name');
        $item_brand = request('item_brand');
        $item_price = request('item_price');
        $item_stock_qty = request('item_qty');

        //Update existing item info
        Item::where('item_id', $item_id)->update(['vendor_id' => $vendor_id, 'item_name' => $item_name, 'item_brand' => $item_brand, 'item_price' => $item_price, 'item_stock_qty' => $item_stock_qty]);

        return redirect('/stock');
    }

    public function stockStore()
    {
        //Create new Item object and store values.
        $item = new Item();
        $item->item_id = request('item_id');
        $item->vendor_id = request('vendor_id');
        $item->item_name = request('item_name');
        $item->item_brand = request('item_brand');
        $item->item_price = request('item_price');
        $item->item_stock_qty = request('item_qty');



        //Insert Item values
        $item->save();


        return redirect('/stock');
    }

    public function stockDestroy($item_id)
    {
        //Delete data from request_details
        $data2 = Request_detail::select('*')->where('item_id', '=', $item_id)->delete();

        //Delete data from Order_details
        $data3 = Order_detail::select('*')->where('item_id', '=', $item_id)->delete();

        //Delete data from items
        $data1 = Item::select('*')->where('item_id', '=', $item_id)->delete();
        return redirect('/stock');
    }
    public function stockReport()
    {
        //Query for Brands
        $data = Item::groupBy('item_brand')->orderBy('sum', 'desc')->select('item_brand', \DB::raw("count(item_id) as sum"))->get();

        //Query for Low Stock
        $data2 = Item::select('item_id', 'item_name', 'item_stock_qty')->where('item_stock_qty', '<', '30')->get();

        //Query for Latest Order
        $getLatestOrder = Order::select('*')->orderBy('created_at', 'desc')->take(1)->get();

        //Query for latest Order Data
        $data3 = Order_detail::join('orders', 'order_details.order_id', '=', 'orders.order_id')->join('items', 'order_details.item_id', '=', 'items.item_id')->select('items.*', 'order_details.order_qty', 'orders.*')->where('orders.order_id', '=', $getLatestOrder[0]->order_id)->get();

        return view('stocks.stockReport', ['items' => $data, 'items2' => $data2, 'items3' => $data3]);
    }

    //REQUEST ITEM CONTROLLER-------------------------------------------
    public function requestCreate()
    {
        $data = Item::all();
        return view('requests.requestCreate', ['items' => $data]);
    }

    public function requestStore(Request $request)
    {

        $time = Carbon::now()->toDateTimeString();
        $currentid = auth()->user()->staff_id;
        $data = $request->all();
        $req_id = DB::table('requests')->count() + 1;
        if ($req_id < 10) {
            $req_id = "RQ00" . $req_id;
        } else if ($req_id < 100) {
            $req_id = "RQ0" . $req_id;
        } else {
            $req_id = "RQ" . $req_id;
        }
        DB::table('requests')->insert(['req_id' => $req_id, 'staff_id' => $currentid, 'req_status' => 'Not Approved', 'created_at' => $time, 'updated_at' => $time]);

        if (count($request->item_id) > 0) {
            foreach ($request->item_id as $item => $v)
                $data2[] = array(
                    'req_id' => $req_id,
                    'item_id' => $request->item_id[$item],
                    'req_qty' => $request->req_qty[$item],
                );
            Request_detail::insert($data2);
        }
        return redirect()->back()->with('success', 'Items Requested Sucessfully!');
    }
    public function requestList()
    {
        $currentid = auth()->user()->staff_id;
        $data = DB::table('requests')->select('*')->where('requests.staff_id', '=', $currentid)->get();
        return view('requests.requestList', ['requests' => $data]);
    }

    public function requestShow($req_id)
    {
        $i = 1;
        $data = DB::table('requests')->join('request_details', 'requests.req_id', '=', 'request_details.req_id')
            ->join('items', 'request_details.item_id', '=', 'items.item_id')->select('requests.*', 'request_details.*', 'items.*')
            ->where('request_details.req_id', '=', $req_id)->get();
        return view('requests.requestShow', ['requests' => $data, 'a' => $i, 'reqid' => $req_id]);
    }

    public function requestDelete($req_id, $item_id)
    {
        DB::table("request_details")->where('req_id', '=', $req_id)->where('item_id', '=', $item_id)->delete();
        return redirect('/request/list/' . $req_id);
    }

    public function requestUpdate($req_id, request $data)
    {
        $item_id = $data->input('item_id', []);
        $quantity = $data->input('req_qty', []);
        $count = count($data->item_id);
        DB::table("request_details")
            ->where('req_id', '=', $req_id)
            ->delete();
        for ($i = 0; $i < $count; $i++) {
            DB::table('request_details')->insert(
                [
                    'req_id' => $req_id,
                    'req_qty' => $quantity[$i],
                    'item_id' => $item_id[$i],
                ]
            );
        }
        return redirect('/request/list/' . $req_id);
    }

    //AUDIT REPORT CONTROLLER----------------------------------------------------------------------------------------------------------------------------------------
    public function auditIndex()
    {
        $a = 1;
        $auditreport = Audits::all();


        return view('audit.welcome', [
            'auditreport' => $auditreport, 'a' => $a
        ]);
    }

    public function auditShow($id)
    {
        $deta = DB::table('audits')->join('audit_details', 'audits.audit_id', '=', 'audit_details.audit_id')->join('orders', 'audit_details.order_id', '=', 'orders.order_id')->join('order_details', 'orders.order_id', '=', 'order_details.order_id')->join('items', 'order_details.item_id', '=', 'items.item_id')->join('vendors', 'items.vendor_id', '=', 'vendors.vendor_id')->select('orders.order_id', 'orders.total_price', 'order_details.order_qty', 'order_details.item_total_price', 'items.item_id', 'items.item_price', 'vendors.vendor_company', 'items.item_id')->where('audits.audit_id', '=', $id)->get();

        $details = DB::table('audits')->join('audit_details', 'audits.audit_id', '=', 'audit_details.audit_id')->join('orders', 'audit_details.order_id', '=', 'orders.order_id')->select('audits.audit_id', 'orders.order_id', 'orders.staff_id')->where('audits.audit_id', '=', $id)->get();
        $a = 1;

        return view('audit.auditdetail', [
            'auditDetails' => $details, 'detaa' => $deta, 'a' => $a
        ]);
    }
}