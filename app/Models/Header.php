<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    protected $table = "headers";

    protected $fillable = [
        "image", "titre1", "titre2", "titre3", "titre4", "titre5", "titre6",
    ];
}
