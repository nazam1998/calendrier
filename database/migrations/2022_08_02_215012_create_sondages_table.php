<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSondagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sondages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_valide');
            $table->foreign('event_valide')->on('events')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('event_sondage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('sondage_id');
            $table->foreign('event_id')->on('events')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sondage_id')->on('sondages')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('sondage_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('sondage_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('event_id')->on('events')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('sondage_id')->on('sondages')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sondages');
    }
}
