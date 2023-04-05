<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary();
            $table->string('lat');
            $table->string('lng');
            $table->decimal('wallet')->default(0)->nullable();
            $table->integer('rate')->default(0)->nullable();
            $table->boolean('is_available')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providers');
    }
}
