<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeoplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peoples', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['male', 'female','other']);
            $table->string('address');
            $table->string('job');
            $table->string('about');
            $table->string('contact');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('pictures');
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
        Schema::dropIfExists('peoples');
    }
}
