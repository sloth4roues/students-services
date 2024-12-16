<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoryColumnInAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            // Supprimer l'ancienne colonne category si elle existe
            if (Schema::hasColumn('ads', 'category')) {
                $table->dropColumn('category');
            }
            
            // Ajouter la nouvelle colonne category
            $table->string('category', 255)->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            // Supprimer la nouvelle colonne category
            $table->dropColumn('category');
            
            // Recréer l'ancienne colonne category si nécessaire
            $table->enum('category', ['Prêt de matériel', 'Cours particulier', 'Groupe d\'étude', 'Sorties'])->nullable()->after('status');
        });
    }
}
