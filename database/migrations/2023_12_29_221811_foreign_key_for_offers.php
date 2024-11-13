<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyForOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('offres', function (Blueprint $table) {
            $table->foreignId('journalar_id')->nullable()->constrained();
            $table->foreignId('journalfr_id')->nullable()->constrained();
            //$table->foreignId('adminetab_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offres', function (Blueprint $table) {
            // Remove the foreign key
            $table->dropForeign(['journalar_id']);
            $table->dropForeign(['journalfr_id']);
            //$table->dropForeign(['adminetab_id']);
        });
    }
}
