<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLignedevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lignedevis', function (Blueprint $table) {
            $table->id();

            $table->int('devis_id');
            $table->int('product_id');
            $table->int('facturation_id');
            $table->string('description');
            $table->int('quantity');
            $table->int('price');

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
        Schema::dropIfExists('lignedevis');
    }
}
