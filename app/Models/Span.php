<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Span extends Model
{
    use HasFactory;
    protected $table = "spans";

    protected $fillable = [
    "position1", "position2", "position3"
    ];
    public function titres(){
        return $this->hasMany(Titre::class);
    }
}
