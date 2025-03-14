<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'price', 'description', 'condition', 'image_path', 'category_id'];


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
