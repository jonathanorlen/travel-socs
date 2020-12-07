<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agent_id');
            $table->bigInteger('place_id')->nullable();
            $table->bigInteger('city_id');
            $table->string('place', 30)->nullable();
            $table->string('price');
            $table->string('banner', 50);
            $table->string('picture', 255);
            $table->text('facilities')->nullable()->default('text');
            $table->text('description')->nullable()->default('text');
            $table->text('destination')->nullable()->default('text');
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
        Schema::dropIfExists('packages');
    }
}
