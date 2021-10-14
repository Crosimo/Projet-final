<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titre extends Model
{
    use HasFactory;

    protected $table = "titres";

    protected $fillable = [
        "titre0", "description0", "titre1", "description1", "titre2", "description2", "titre3", "description3","titre4", "description4","titre5", "description5","titre6", "description6", "titre7", "description7"
    ];
}
