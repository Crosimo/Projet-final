<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $table = "trainers";

    protected $fillable = [
    "nom",
    "image",
    "role_id",
    "facebook",
    "facebookLien",
    "twitter",
    "twitterLien",
    "instagram",
    "instagramLien",
    "pinterest",
    "pinterestLien",
    ];

    public function classes(){
        return $this->hasMany(Classe::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
