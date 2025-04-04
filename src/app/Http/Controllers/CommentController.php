<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $item_id)
    {
        $request->validate([
            'comment' => 'required|max:255',
        ]);

        $item = Item::findOrFail($item_id);

        $comment = new Comment();
        $comment->user_id = auth()->id(); // ログインユーザーのIDをセット
        $comment->item_id = $item->id;    // 商品IDをセット
        $comment->content = $request->comment;
        $comment->save();

        // コメント送信後、商品詳細画面にリダイレクト
        return redirect()->route('item.show', $item->id);
    }
}
