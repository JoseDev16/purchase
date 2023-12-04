<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PurchaseOrderDetail extends Model
{
    use HasFactory;

    /** Metodo para relacionar un producto con una orden de compra
     * @param $purchaseOrderId int id de la purchase order a relacionar
     * @param $invProductId int id del producto a agregar a la orden de compra
     * @param $invUm int id de la unidad de medida
     * @return void
     */
    public static function addProduct($purchaseOrderId,$invProductId,$invUm){
        self::create([
            'purchase_order_id'     => $purchaseOrderId,
            'inv_product_id'        => $invProductId,
            'inv_unit_measurement'  => $invUm
        ]);
    }

    /**Obtiene los productos en una orden de compra
     * @param $purchaseOrderId int id de la orden de compra
     * @return array listado de productos en la orden de compra
     */
    public static function getProducts($purchaseOrderId) :array{
     return   DB::select("SELECT ip.code,ip.description,ipmp.price,pod.qty FROM purchase_order_details pod
                    join inv_product_measurement_prices ipmp on pod.inv_product_measurement_price_id = ipmp.id
                    join inv_products ip on ipmp.inv_product_id = ip.id
                    where pod.purchase_order_id = ?",[$purchaseOrderId]);
    }
}
