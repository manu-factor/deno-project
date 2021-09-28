<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('holes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // name of the borehole
            $table->string('location'); // i.e karatina, tetu
            $table->string('lat'); // latitude
            $table->string('long'); // longitude
            $table->string('agency'); // i.e name of agency i.e Davies & Shirtliff, Ministry
            $table->string('DOI');
            $table->string('tapping'); // i.e manual, electric, solar
            $table->boolean('status')->default(true); // true fo operational, false for non-operational
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
        Schema::dropIfExists('holes');
    }
}
