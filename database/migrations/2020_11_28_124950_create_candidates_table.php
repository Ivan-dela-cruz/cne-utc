<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('url_image')->nullable();
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('position_id');
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('indent')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('position_id')->references('id')->on('positions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidates');
    }
}
