<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::where('user_id', '!=', auth()->id()) // ユーザーが出品した商品を除外
            ->take(10) // 10件に制限
            ->get();

        //dd($items);  // データの確認
        return view('items.index', compact('items'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $items = Item::query()
            ->where('name', 'like', '%' . $query . '%') // 商品名で部分一致検索
            ->get();

        return view('items.index', compact('items')); // 商品一覧ページに結果を渡す
    }

    public function show($id)
    {
        $item = Item::findOrFail($id); // 商品が見つからない場合は 404 エラー
        return view('items.show', compact('item'));
    }

    // 商品出品フォームを表示
    public function create()
    {
        return view('items.create');  // 商品出品画面のビューを返す
    }

    // 商品出品フォームのデータを保存
    public function store(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'productImage' => 'required|image|mimes:jpeg,png,jpg,gif',
            'category' => 'required',
            'condition' => 'required',
            'productName' => 'required|string|max:255',
            'brandName' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        // データベースへの保存（仮の処理）
        // 実際には、モデルを使ってデータベースに保存することが多い
        // ここでは一旦セッションにデータを保存して、表示確認用とします
        $request->session()->flash('success', '商品が正常に出品されました！');

        return redirect()->route('item.create');  // 再度出品フォームへリダイレクト
    }
}

