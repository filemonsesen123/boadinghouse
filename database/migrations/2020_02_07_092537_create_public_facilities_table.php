<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_facilities', function (Blueprint $table) {
            $table->bigIncrements('id_public_facility');
            $table->time('buka');
            $table->time('tutup');
            $table->string('name');
            $table->string('image');
            $table->integer('category');
            $table->text('description');
            $table->float('long');
            $table->float('lat');
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
        Schema::dropIfExists('public_facilities');
    }
}
