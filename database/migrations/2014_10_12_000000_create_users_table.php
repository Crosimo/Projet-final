<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('facebook')->nullable();
            $table->string('facebookLien')->nullable();
            $table->string('instagram')->nullable();
            $table->string('instagramLien')->nullable();
            $table->string('twitter')->nullable();
            $table->string('twitterLien')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('pinterestLien')->nullable();
            $table->foreignId('role_id')->constrained('roles', 'id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pricing_id')->constrained('pricings', 'id')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
