<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("lestags");
            $table->timestamp("heureDébut");
            $table->timestamp("heureFin");
            $table->string("image");
            $table->foreignId('trainer_id')->constrained('trainers', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('categorie_id')->constrained('categories', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pricing_id')->constrained('pricings', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('places');
            // $table->json('participants')->nullable();
            $table->boolean('prioritaire');
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
        Schema::dropIfExists('classes');
    }
}
