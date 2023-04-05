<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmins extends Migration {

    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');

            //
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->timestamps();
        });

        \App\Models\Admin::create([
            'name'              => 'super admin',
            'email'             => 'admin@admin.com',
            'email_verified_at' => \Carbon\Carbon::now(),
            'password'          => bcrypt('123123123'),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}