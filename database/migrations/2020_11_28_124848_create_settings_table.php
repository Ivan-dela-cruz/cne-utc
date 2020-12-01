<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name_app')->nullable();
            $table->string('logo_app')->nullable();
            $table->string('title_app')->nullable();
            $table->string('image_app')->nullable();
            $table->json('colors_app')->nullable();
            $table->json('banner_app')->nullable();
            $table->json('footer_app')->nullable();
            $table->json('content_app')->nullable();
            $table->json('config_app')->nullable();
            $table->json('access_toke')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('settings');
    }
}
