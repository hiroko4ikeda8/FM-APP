<?php

namespace App\Http\Controllers;

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
        // 検索キーワード取得（クエリパラメータ or セッションで維持）
        $query = $request->input('query', session('search_query'));

        // 検索された商品のIDを取得（検索結果があれば）
        $searchResults = collect(); // デフォルトは空
        if ($query) {
            // 商品名に部分一致するIDを取得
            $searchResults = Item::where('name', 'LIKE', "%{$query}%")->pluck('id');
            session(['search_query' => $query]); // 検索ワードをセッションに保持
        }

        // おすすめ商品一覧を取得（ただし、検索結果の商品は除外）
        $recommendItems = Item::whereNotIn('id', $searchResults) // 検索結果を除外
            ->take(10) // 最大10件
            ->get();

        // 検索結果に一致する商品を追加で取得（おすすめに表示する商品）
        $searchedItems = Item::whereIn('id', $searchResults)
            ->take(10) // 検索結果から10件だけ表示
            ->get();

        // 既に表示されているおすすめ商品と検索結果を統合する
        $allItems = $recommendItems->merge($searchedItems);

        return view('items.index', [
            'searchResults' => $searchedItems,
            'recommendItems' => $allItems,
            'query' => $query
        ]);
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

