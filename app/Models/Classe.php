<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table = "classes";

    protected $fillable =  [
        "nom", "instructeur", "heure", "image"
    ];
    public function tags(){
        $this->belongsToMany(Tag::class, 'classe_tag');
    }

    public function trainer(){
        return $this->belongsTo(Trainer::class);
    }
}
