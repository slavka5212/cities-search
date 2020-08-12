<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('cities');
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('district', 30)->nullable(); // okres
            $table->string('region', 40)->nullable(); // kraj
            $table->string('ico', 10)->nullable();
            $table->string('mayor', 50)->nullable(); //starosta
            $table->string('tel')->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->string('img')->nullable();
            $table->float('lat', 10, 7)->nullable();
            $table->float('lng', 10, 7)->nullable();
            $table->string('url')->nullable();
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
        Schema::dropIfExists('cities');
    }
}
