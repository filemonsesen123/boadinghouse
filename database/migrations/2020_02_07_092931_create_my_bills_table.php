<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_bills', function (Blueprint $table) {
            $table->bigIncrements('id_bills');
            $table->integer('id_user');
            $table->string('status');
            $table->integer('id_category');
            $table->date('paid');
            $table->date('must_pay');
            $table->integer('price');
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
        Schema::dropIfExists('my_bills');
    }
}
