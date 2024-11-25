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
        if (!Schema::hasColumn('pregledi', 'created_at')) {
            $table->timestamp('created_at')->nullable(); // Dodaje samo created_at
        }
    });
}

public function down()
{
    Schema::table('pregledi', function (Blueprint $table) {
        if (Schema::hasColumn('pregledi', 'created_at')) {
            $table->dropColumn('created_at');
        }
    });
}

};
