<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string("image");
            $table->string("description");
            $table->string("email");
            $table->string("logoEmail");
            $table->string("tel");
            $table->string("logoTel");
            $table->string("adresse");
            $table->string("logoAdresse");
            $table->string("tweets");
            $table->string("tweetcontenu1");
            $table->string("tweetcontenu2");
            $table->string("tweetIcon");
            $table->string("getintouch");
            $table->string("formElem1");
            $table->string("formElem2");
            $table->string("formElem3");
            $table->string("copyright");
            $table->string("copyrightAnnée");
            $table->string("copyrightEntreprise");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footers');
    }
}
