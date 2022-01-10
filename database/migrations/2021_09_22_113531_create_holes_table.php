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
            $table->string('longitude'); // longitude
            $table->string('latitude'); // latitude
            $table->string('z_axis'); // depth
            $table->string('file_no'); // file number
            $table->string('DOI'); // date of installation
            $table->string('owner_name'); // Name of Owner
            $table->string('category'); // category
            $table->string('the_type'); // type
            $table->string('mapsheet'); // mapsheet
            $table->string('SRO'); // i.e muranga
            // $table->timestamps();
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
