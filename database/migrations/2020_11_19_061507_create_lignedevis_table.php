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
            $table->foreignId('devis_id')->nullable()->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained();
            $table->foreignId('facturation_id')->nullable()->constrained();
            $table->string('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->float('price')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('lignedevis');
        Schema::enableForeignKeyConstraints();
    }
}
