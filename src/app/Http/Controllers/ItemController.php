<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExhibitionRequest;
use App\Models\Like;
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
        // ログインしているユーザーがその商品にいいねしているかを確認
        $userHasLiked = null;
        if (auth()->check()) {
            $userHasLiked = Like::where('user_id', auth()->id())->where('item_id', $id)->exists();
        }

        // いいねの合計数を取得
        $likeCount = Like::where('item_id', $id)->count();

        // ビューに渡すデータ
        return view('items.show', compact('item', 'isSold', 'userHasLiked', 'likeCount'));
    }

    // 商品出品フォームの表示
    public function create()
    {
        // カテゴリを取得（例：カテゴリ名とIDのリストを取得）
        $categories = Category::all();

        // 商品の状態を機械的な値（サーバー側のデータ）で定義
        $conditions = [
            'good' => '良好',
            'almost_new' => '目立った傷や汚れなし',
            'slightly_used' => 'やや傷や汚れあり',
            'poor_condition' => '状態が悪い',
        ];
                
        // ビューにカテゴリデータと商品状態データを渡す
        return view('items.create', compact('categories', 'conditions'));
    }

    // 商品出品フォームのデータを保存
    public function store(ExhibitionRequest $request)
    {
        // 文字列で送られてきたカテゴリ（例: "1,2,3"）を配列に変換
        $request->merge([
            'categories' => explode(',', $request->input('categories'))
        ]);

        $validated = $request->validated();

        // 商品画像の保存
        $imagePath = null;
        if ($request->hasFile('productImage')) {
            $imagePath = $request->file('productImage')->store('images', 'public');
        }

        // 商品データの保存
        $item = new Item();
        $item->name = $validated['productName'];
        $item->brand = $validated['brandName'] ?? null;
        $item->description = $validated['description'] ?? null;
        $item->price = $validated['price'];
        $item->image_path = $imagePath;
        $item->condition_id = $validated['condition'];
        $item->user_id = auth()->id();
        $item->save();

        // カテゴリとの紐づけ
        $item->categories()->attach($validated['categories']);

        // 成功メッセージとリダイレクト
        $request->session()->flash('success', '商品が正常に出品されました！');
        return redirect()->route('item.index', ['page' => 'mylist'])->with('success', '商品を出品しました');
    }
}

