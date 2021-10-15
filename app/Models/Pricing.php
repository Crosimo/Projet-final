<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $table = "pricings";

    protected $fillable = ["packageTitle", "packagePrice", "packageLink1",
"packageLink2", "packageLink3", "packageLink4", "button"
];
    
    public function users(){
        return $this->hasMany(User::class);
    }
    
}
