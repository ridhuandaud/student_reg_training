<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLookupForReferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // races
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // religions
        Schema::create('religions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // genders
        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // statuses
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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
        // races
        Schema::dropIfExists('races');

        // religions
        Schema::dropIfExists('religions');

        // genders
        Schema::dropIfExists('genders');

        // statuses
        Schema::dropIfExists('statuses');
    }
}
