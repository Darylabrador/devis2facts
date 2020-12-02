<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailledInfoColumnsInFacturationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facturations', function (Blueprint $table) {
            $table->float('montantTva')->default(0);
            $table->float('ttc')->default(0);
            $table->float('tht')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facturations', function (Blueprint $table) {
            $table->dropColumn('montantTva');
            $table->dropColumn('ttc');
            $table->dropColumn('tht');
        });
    }
}
