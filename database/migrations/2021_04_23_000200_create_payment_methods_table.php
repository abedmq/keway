<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');
            $table->string('code')->nullable();

            $table->integer('language_id')->default(1);
            $table->integer('parent_id')->default(0);
            $table->integer('admin_id')->default(1);
            $table->integer('sort')->default(5);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        \App\Models\PaymentMethod::create([
            'title'       => 'cash',
            'description' => 'pay by cash',
            'code'        => 'cash',
        ]);
        \App\Models\PaymentMethod::create([
            'title'       => 'cards',
            'description' => 'pay by cards',
            'code'        => 'cards',
        ]);
//        \App\Models\PaymentMethod::create([
//            'title'       => 'banks',
//            'description' => 'pay by banks',
//            'code'        => 'banks',
//        ]);
//        \App\Models\PaymentMethod::create([
//            'title'       => 'paypal',
//            'description' => 'pay by paypal',
//            'code'        => 'paypal',
//        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_methods');
    }
}
