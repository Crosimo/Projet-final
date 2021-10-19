<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tags";

    protected $fillable =  [
        "nom"
    ];
    
    public function classes(){
        return $this->belongsToMany(Classe::class, 'classe_tags');
    }

    
}
