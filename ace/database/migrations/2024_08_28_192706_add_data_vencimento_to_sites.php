<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->date('vencimento_hospedagem')->after('hospedagem')->nullable();
            $table->date('vencimento_dominio')->after('registro_dominio')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->dropColumn('vencimento_hospedagem');
            $table->dropColumn('vencimento_dominio');
        });
    }
};
