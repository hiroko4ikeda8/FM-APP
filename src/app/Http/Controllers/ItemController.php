<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    //public function index()
    //{
    //$items = Item::where('user_id', '!=', auth()->id()) // ユーザーが出品した商品を除外
    //->take(10) // 10件に制限
    //->get();

    //dd($items);  // データの確認
    //return view('items.index', compact('items'));
    //}

    public function index(Request $request)
    {
        $keyword = $request->input('query', session('search_query')); // 検索ワード取得
        $userId = auth()->id(); // ログインユーザーのID取得

        if ($keyword) {
            // 検索ワードがある場合 → 検索結果のみ取得（ログインユーザーの商品も含める）
            $items = Item::where('name', 'LIKE', "%{$keyword}%")->get();
            $recommendItems = $items; // 検索結果をおすすめ商品として表示
        } else {
            // 検索ワードがない場合 → ログインユーザーの商品を除外し、おすすめ商品を10件取得
            $items = Item::keywordSearch(null, $userId)
                ->take(10)
                ->get();
            $recommendItems = $items; // おすすめ商品として表示
        }

        return view('items.index', [
            'items' => $items,
            'recommendItems' => $recommendItems, // Blade で使う変数を渡す
            'query' => $keyword
        ]);
    }

    // 商品詳細画面を表示
    public function show($id)
    {
        // 商品と、それに紐づくコメントとコメントしたユーザーを一度に取得
        $item = Item::with('comments.user', 'categories')->find($id);

        /// 商品が見つからない場合にsoldを渡す
        $isSold = !$item;

        return view('items.show', compact('item', 'isSold'));
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

        // 商品画像の保存
        if ($request->hasFile('productImage')) {
            $imagePath = $request->file('productImage')->store('images', 'public');  // publicディスクに保存
        }

        // 商品データの保存
        $item = new Item();
        $item->name = $request->productName;
        $item->brand = $request->brandName;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image_path = $imagePath ?? null;  // 画像パスを保存（画像があれば）
        $item->condition_id = $request->condition;  // 状態を紐づけ（もし状態が別テーブルにある場合）

        // カテゴリを保存（リレーションがある場合）
        $category = Category::find($request->category);
        $item->categories()->attach($category);

        // 商品をデータベースに保存
        $item->save();

        // セッションに成功メッセージ
        $request->session()->flash('success', '商品が正常に出品されました！');

        return redirect()->route('item.create');  // 出品フォームにリダイレクト
    }
}

