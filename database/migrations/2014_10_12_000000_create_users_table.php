<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('password');
            $table->string('mobile')->unique();
            $table->string('new_mobile')->nullable();
            $table->string('image')->nullable();
            $table->string('mobile_code')->nullable();
            $table->enum('type', ['customer', 'provider'])->default('customer');
            $table->timestamp('mobile_code_send')->nullable();
            $table->integer('mobile_code_count')->default(0);
            $table->timestamp('mobile_verified_at')->nullable();
            $table->integer('language_id')->default(1);
            $table->integer('status')->default(1);
            $table->boolean('is_complete')->default(1);

            $table->boolean('is_available')->default(1);
            $table->decimal('wallet')->default(0)->nullable();
            $table->integer('rate')->default(0)->nullable();

            $table->decimal('lat', 10, 4)->nullable();
            $table->decimal('lng', 10, 4)->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });


        \App\Models\User::create([
            'name'               => 'abedelrahman abu amna',
            'status'             => 1,
            'mobile'             => "0598700543",
            'mobile_verified_at' => \Carbon\Carbon::now(),
            'password'           => '123123123',
        ]);
        \App\Models\User::create([
            'name'               => 'abedelrahman abu amna',
            'mobile'             => '0567471020',
            'mobile_verified_at' => \Carbon\Carbon::now(),
            'password'           => '123123123',
        ]);

        $provider = \App\Models\User::create([
            'name'               => 'abedelrahman abu amna',
            'status'             => 1,
            'is_complete'        => 1,
            'mobile'             => "0598700542",
            'mobile_verified_at' => \Carbon\Carbon::now(),
            'password'           => '123123123',
            'lat'                => 22,
            'lng'                => 33,
            'type'               => 'provider',
        ]);
        $provider = \App\Models\User::create([
            'name'               => 'abedelrahman abu amna',
            'mobile'             => '0567471022',
            'mobile_verified_at' => \Carbon\Carbon::now(),
            'password'           => '123123123',
            'lat'                => 21,
            'lng'                => 34,
            'status'             => 1,
            'is_complete'        => 1,
            'type'               => 'provider',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
