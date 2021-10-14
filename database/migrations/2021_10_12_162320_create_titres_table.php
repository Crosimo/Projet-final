<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('titres', function (Blueprint $table) {
            $table->id();
            $table->string('titre0');
            $table->string('description0');
            $table->string('titre1');
            $table->text('description1');
            $table->string('titre2');
            $table->string('description2');
            $table->string('titre3');
            $table->string('description3');
            $table->string('titre4');
            $table->string('description4');
            $table->string('titre5');
            $table->string('description5');
            $table->string('titre6');
            $table->string('description6');
            $table->string('titre7');
            $table->string('description7');
            $table->string('titre8');
            $table->string('description8');
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
        Schema::dropIfExists('titres');
    }
}
