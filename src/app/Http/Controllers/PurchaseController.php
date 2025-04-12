<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Purchase;
use App\Http\Requests\PurchaseRequest;
use App\Models\ShippingAddress;
use App\Models\Item;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // 商品購入画面表示
    public function show($item_id)
    {
        $item = Item::findOrFail($item_id);

        // ログインユーザーの送付先住所を取得
        $shippingAddress = ShippingAddress::where('user_id', auth()->id())->first();

        // 商品情報と住所をビューに渡す
        return view('purchases.purchase', compact('item', 'shippingAddress'));
    }

    public function editAddress($item_id)
    {
        // ユーザーの住所情報を取得
        $userId = auth()->id(); // 現在ログインしているユーザーID
        $shippingAddress = ShippingAddress::where('user_id', $userId)->first(); // ユーザーの住所情報を取得

        // 必要に応じて、$item_id を使用してデータを取得する処理を追加します
        return view('purchases.address-edit', compact('item_id', 'shippingAddress')); // $shippingAddress をビューに渡す
    }

    public function updateAddress(AddressRequest $request, $itemId)
    {
        $userId = auth()->id();

        // 住所取得 or 新規作成
        $shippingAddress = ShippingAddress::firstOrNew(['user_id' => $userId]);

        $shippingAddress->postal_code = $request->postcode;
        $shippingAddress->address = $request->address;
        $shippingAddress->building_name = $request->build;
        $shippingAddress->save();

        // 更新後は、購入画面（この商品）に戻る
        return redirect()->route('purchase.show', ['item_id' => $itemId])
            ->with('success', '送付先住所を更新しました');
    }

    public function store(PurchaseRequest $request, $item_id)
    {
        // バリデーション通過後の処理
        $validated = $request->validated();

        // $validated['payment_method'] などを使って処理を続行
    }

    public function confirm(Request $request, Item $item)
    {
        // 1. 購入者情報を保存（例：purchasesテーブルにinsert）

        Purchase::create([
            'user_id' => auth()->id(),
            'item_id' => $item->id,
            'payment_method' => $request->payment_method,
        ]);

        // 2. 該当商品を「sold」に変更
        $item->status = 'sold'; // または sold_flg = true;
        $item->save();

        return redirect()->route('purchase.complete');
    }
}


