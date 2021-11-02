<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table = "classes";

    protected $fillable =  [
        "nom", "instructeur", "heure", "image", "places"
    ];
    protected $casts = [
        'participants' => 'array'
    ];
    protected $dates = ['heureDébut', 'heureFin'];
    public function tags(){
       return $this->belongsToMany(Tag::class, 'classe_tags');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'classe_users');
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
