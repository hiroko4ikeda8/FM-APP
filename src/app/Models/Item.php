<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'price', 'description', 'condition', 'image_path', 'category_id'];

    // 検索用スコープ
    public function scopeKeywordSearch($query, $keyword, $userId)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%'); // 商品名で検索
        }

        if ($userId) {
            $query->where('user_id', '!=', $userId); // ログインユーザーの商品を除外
        }

        // 生成されるSQLクエリとバインドされたパラメータをデバッグ
        //dd($query->toSql(), $query->getBindings());
    }

    // 購入済み商品かどうかを判定するアクセサ
    public function getIsSoldAttribute()
    {
        return !is_null($this->sold_at);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Item.php
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Item.php
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Item.php
    public function purchases()
    {
        return $this->hasMany(purchase::class);
    }

    // Item.php
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
