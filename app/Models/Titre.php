<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titre extends Model
{
    use HasFactory;

    protected $table = "titres";

    protected $fillable = [
        "titre", "description", "span_id"
    ];

    public function span(){
        return $this->belongsTo(Span::class);
    }
}
