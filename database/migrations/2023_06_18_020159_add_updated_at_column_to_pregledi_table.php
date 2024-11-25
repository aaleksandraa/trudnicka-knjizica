<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('pregledi', function (Blueprint $table) {
        $table->timestamps(); // Dodajte ovu liniju da biste automatski generisali created_at i updated_at kolone
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pregledi', function (Blueprint $table) {
            //
        });
    }
};
