

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
<<<<<<< HEAD
        Schema::dropIfExists('clientaddresses');
=======
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('clients');
        Schema::enableForeignKeyConstraints();
>>>>>>> 0e6d2734cf71fced12365992c6c81a3adae10f0a
    }
}
