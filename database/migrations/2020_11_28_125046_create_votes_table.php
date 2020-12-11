<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('enclosure_id');
            $table->unsignedBigInteger('election_id');
            $table->unsignedBigInteger('president');
            $table->unsignedBigInteger('national');
            $table->unsignedBigInteger('province');
            $table->unsignedBigInteger('parlament');
            $table->integer('meeting')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('type_vote')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('enclosure_id')->references('id')->on('enclosures');
            $table->foreign('election_id')->references('id')->on('elections');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
