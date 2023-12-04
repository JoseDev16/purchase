<?php

namespace App\Http\Controllers;

use App\Models\InvProduct;
use App\Models\InvUnitMeasurement;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function index(){
        $clients = Client::all();
        return view('PurchaseOrder.purchase-order-index',compact('clients'));
    }

    public function create(){
        return view('PurchaseOrder.purchase-order-create');
    }

    public function assignClientToPurchaseOrder(Request $request){
        $validated = $request->validate([
            'client_id' => 'required',
        ]);
        $client = Client::find($request->client_id);
        $products = InvProduct::all();
        $units = InvUnitMeasurement::all();
        $purchaseOrder = PurchaseOrder::store($client->id);
        $items =
        return view('PurchaseOrder.purchase-order-create',compact('client','products','units','purchaseOrder'));
    }

    public function addProduct(Request $request){
        try {
            DB::beginTransaction();
            PurchaseOrderDetail::addProduct($request->puchase_order_id,$request->product_id,$request->um_id);
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            return back()->with('error',$exception->getMessage());
        }

    }



    public function storeFromJson(Request $request){
    }

    public function close(Request $request){

    }


}
