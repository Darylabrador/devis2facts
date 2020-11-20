

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientaddresses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->integer('postcode');
            $table->foreignId('client_id')->nullable()->constrained();
            $table->string('city'); 
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
        Schema::dropIfExists('clientaddresses');
        Schema::enableForeignKeyConstraints();
    }
}
