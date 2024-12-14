<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::dropIfExists('cache');
}

public function down()
{
    // Laissez vide si vous ne voulez pas recréer la table
}
};
