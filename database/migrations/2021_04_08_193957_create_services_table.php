<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->integer('language_id')->default(1);
            $table->integer('parent_id')->nullable();
            $table->integer('sort')->default(5);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        \App\Models\Service::create(['title' => 'electric', 'description' => 'electric', 'image' => '3VlBNcgJfnunl1OXhInloHqEF94ZwGzZTqqKcfY5.png']);
        \App\Models\Service::create(['title' => 'carpenter', 'description' => 'carpenter', 'image' => '3VlBNcgJfnunl1OXhInloHqEF94ZwGzZTqqKcfY5.png']);
        \App\Models\Service::create(['title' => 'Plumber', 'description' => 'Plumber', 'image' => '3VlBNcgJfnunl1OXhInloHqEF94ZwGzZTqqKcfY5.png']);

        Schema::create('service_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->primary(['service_id', 'user_id']);
        });

        $providers = \App\Models\User::provider()->get();
        $providers[0]->services()->attach(1);
        $providers[1]->services()->attach(2);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_user');
    }
}
