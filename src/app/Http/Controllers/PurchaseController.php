<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // 商品購入画面表示
    public function show($item_id)
    {
        // 仮の商品データを返す（動的なデータは後で追加）
        $item = [
            'name' => '商品名',
            'brand' => 'ブランド名',
            'price' => 5000,
            'image' => 'Armani+Mens+Clock.jpg',
        ];

        // 商品情報をビューに渡して表示
        return view('purchases.purchase', compact('item'));
    }
}
