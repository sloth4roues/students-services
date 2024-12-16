<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAcceptedByToAdsTable extends Migration
{
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            // On ne recrée pas la colonne, mais on ajoute la clé étrangère
            $table->foreign('accepted_by')
                  ->references('id')->on('users')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropForeign(['accepted_by']);
        });
    }
}
