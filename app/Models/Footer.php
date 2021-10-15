<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = "footers";

    protected $fillable = [
        "image", "description", "email", "tel", "adresse", "tweets", "tweetcontenu1", "tweetcontenu2", "getintouch", "formeElem1","formeElem2","formeElem3","tweetIcon"
    ];
}
