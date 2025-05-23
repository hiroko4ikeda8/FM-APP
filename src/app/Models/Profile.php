<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, Notifiable;


    protected $fillable = ['user_id', 'username', 'postal_code', 'address', 'building_name', 'avatar_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
