<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Item;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // いいねを追加・削除する処理
    public function toggleLike($itemId)
    {
        // 商品の存在確認
        $item = Item::findOrFail($itemId);

        // ユーザーがすでにいいねしているか確認
        $like = Like::where('user_id', auth()->id())
            ->where('item_id', $itemId)
            ->first();

        if ($like) {
            // すでにいいねしている場合は解除
            $like->delete();
        } else {
            // いいねしていない場合は新たに追加
            Like::create([
                'user_id' => auth()->id(),
                'item_id' => $itemId,
            ]);
        }

        // 商品詳細画面にリダイレクト（いいね数を更新）
        return redirect()->route('item.show', $itemId);
    }
}
