<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('studentaddresses', function (Blueprint $table) {
            $table->string('postalCode')->after('id');
            $table->string('street')->after('postalCode');
            $table->string('city')->after('street');
            $table->string('country')->after('city');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('studentaddresses', function (Blueprint $table) {
            //
        });
    }
};
