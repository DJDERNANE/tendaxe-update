<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacteurProformasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facteur_proformas', function (Blueprint $table) {
            $table->id();
            $table->string('raison');
            $table->string('fName');
            $table->string('Lname');
            $table->string('email');
            $table->string('phone');
            $table->string('contry');
            $table->string('region');
            $table->string('desc');
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
        Schema::dropIfExists('facteur_proformas');
    }
}
