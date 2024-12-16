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
        Schema::table('ads', function (Blueprint $table) {
            $table->boolean('is_accepted')->default(0); // Colonne pour suivre l'état d'acceptation
            $table->unsignedBigInteger('accepted_by')->nullable(); // Colonne pour enregistrer l'utilisateur ayant accepté l'annonce
        });
    }
    
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn('is_accepted');
            $table->dropColumn('accepted_by');
        });
    }
    
};
