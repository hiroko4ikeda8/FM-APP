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
        ], [
            'comment.required' => 'コメントを入力してください',
            'comment.max' => '255文字以内で入力してください',
        ]);

        $item = Item::findOrFail($item_id);

        $comment = new Comment();
        $comment->user_id = auth()->id(); // ログインユーザーのIDをセット
        $comment->item_id = $item->id;    // 商品IDをセット
        $comment->content = $request->comment;
        $comment->save();

        // JSON形式でレスポンス（Ajax用）
        return response()->json(
            [
                'message' => 'コメントが追加されました',
                'comment_count' => $item->comments()->count()
            ]
        );
    }
}
