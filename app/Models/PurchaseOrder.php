<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\search;

class PurchaseOrder extends Model
{
    use HasFactory;
    private const CODE='PR';

    public static function store($clientId){
       return self::create([
            'code'      => self::getCode(),
            'client_id' => $clientId,
            'date'      => date('y-m-d')
        ]);
    }

    public static function getCode(){
       $qty = self::all()->count() +1;
       $date = date('d-m');
       return self::CODE.$qty.'-'.$date;
    }
}
