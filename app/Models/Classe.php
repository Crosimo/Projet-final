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
       return $this->belongsToMany(Tag::class, 'classe_tags');
    }

    public function users(){
        return $this->belongsToMany(Tag::class, 'classe_users');
     }

    public function trainer(){
        return $this->belongsTo(Trainer::class);
    }

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function pricing(){
        return $this->belongsTo(Pricing::class);
    }
}
