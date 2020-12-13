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
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('canton')->nullable();
            $table->unsignedBigInteger('parish')->nullable();
            $table->unsignedBigInteger('enclosure')->nullable();
            $table->string('gender')->nullable();
            $table->integer('meeting')->nullable();
            $table->string('votes')->nullable();
            $table->string('type_vote')->nullable();
            $table->string('type_election')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
           
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
