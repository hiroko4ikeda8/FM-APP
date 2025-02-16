<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'desscription', 'condition'];


    public function users()
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
