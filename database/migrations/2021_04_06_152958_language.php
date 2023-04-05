<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Language extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');

            $table->string('code');
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->boolean('is_default')->default(0);

            $table->timestamps();
        });

        \App\Models\Language::create([
            'code'       => 'en',
            'name'       => 'English',
            'is_default' => 1,
        ]);

        \App\Models\Language::create([
            'code'       => 'ar',
            'name'       => 'عربي',
            'is_default' => 0,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('languages');
    }
}
