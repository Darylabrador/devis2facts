<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->nullable()->onDelete('cascade');
            $table->string('filename');
            $table->float('tva');
            $table->boolean('is_accepted');
            $table->date('date_expiration');
            $table->float('remise');
            $table->float('tht');
            $table->float('ttc');
            $table->float('montantTva');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('devis');
        Schema::enableForeignKeyConstraints();
    }
}
