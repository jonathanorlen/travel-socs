<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('owner', 30);
            $table->string('profile', 50);
            $table->string('pictures', 255);
            $table->longText('description')->nullable()->default('text');
            $table->string('feature', 100)->nullable()->default('text');
            $table->bigInteger('city_id');
            $table->string('province', 30);
            $table->string('price', 40);
            $table->string('address', 100)->nullable()->default('text');
            $table->string('phone', 15)->nullable();
            $table->string('email', 30)->nullable();
            $table->string('instagram', 30)->nullable();
            $table->string('facebook', 30)->nullable();
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
        Schema::dropIfExists('agents');
    }
}
