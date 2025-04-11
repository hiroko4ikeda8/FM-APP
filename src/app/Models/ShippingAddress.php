<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'postal_code', 'address','building_name'];

    // 送付先住所を保存
    public static function saveShippingAddress($request)
    {
        $shippingAddress = new ShippingAddress();
        $shippingAddress->user_id = auth()->id(); // ログイン中のユーザーIDを取得
        $shippingAddress->postal_code = $request->postcode;
        $shippingAddress->address = $request->address;
        $shippingAddress->building_name = $request->build;
        $shippingAddress->save();
    }


    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
