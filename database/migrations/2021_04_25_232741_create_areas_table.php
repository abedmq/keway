<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('lat', 10, 4);
            $table->decimal('lng', 10, 4);
            $table->integer('diameter');


            $table->integer('language_id')->default(1);
            $table->integer('parent_id')->default(0);
            $table->integer('admin_id')->default(1);
            $table->integer('sort')->default(5);
            $table->boolean('status')->default(1);

            $table->timestamps();
        });

        \App\Models\Area::create([
            'title'    => 'gaza',
            'lat'      => 25,
            'lng'      => 30,
            'diameter' => 50,
        ]);
        \App\Models\Area::create([
            'title'    => 'rafah',
            'lat'      => 70,
            'lng'      => 60,
            'diameter' => 25,
        ]);
        \App\Models\Area::create([
            'title'    => 'north',
            'lat'      => 15,
            'lng'      => 10,
            'diameter' => 70,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
