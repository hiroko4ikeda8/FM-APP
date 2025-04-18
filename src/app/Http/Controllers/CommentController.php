<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Item;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $item_id)
    {
        $item = Item::findOrFail($item_id);

        $comment = new Comment();
        $comment->user_id = auth()->id(); // ログインユーザーのID
        $comment->item_id = $item->id;    // 商品ID
        $comment->content = $request->comment;
        $comment->save();

        return response()->json([
            'message' => 'コメントが追加されました',
            'comment_count' => $item->comments()->count(),
            'comment' => $comment->content,
            'user_name' => $comment->user->name // もしくは $comment->user->name
        ]);
    }
}
