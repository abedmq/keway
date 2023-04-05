<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->integer('language_id')->default(1);
            $table->integer('parent_id')->default(0);
            $table->integer('admin_id')->default(1);
            $table->integer('status')->default(1);

            $table->timestamps();
        });

        \App\Models\OrderStatus::create(['title' => 'waiting']);
        \App\Models\OrderStatus::create(['title' => 'approved']);
        \App\Models\OrderStatus::create(['title' => 'in-way']);
        \App\Models\OrderStatus::create(['title' => 'arrive']);
        \App\Models\OrderStatus::create(['title' => 'check']);
        \App\Models\OrderStatus::create(['title' => 'working']);
        \App\Models\OrderStatus::create(['title' => 'complete']);
        \App\Models\OrderStatus::create(['title' => 'cancel']);


        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('provider_id');
            $table->integer('status_id')->default(1);
            $table->integer('payment_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->integer('cancel_reason_id')->nullable();
            $table->integer('cancel_user_id')->nullable();
            $table->string('cancel_reason')->nullable();
            $table->timestamp('cancel_at')->nullable();

            $table->timestamp('check_at')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('arrive_at')->nullable();

            $table->integer('estimated_time')->default(0);
            $table->integer('estimated_price')->default(0);
            $table->integer('estimated_price_parts')->default(0)->nullable();
            $table->text('check_description')->nullable();


            $table->integer('duration')->default(0);
            $table->timestamp('complete_at')->nullable();
            $table->boolean('is_working')->default(0);
            $table->integer('bring_times')->default(0);
            $table->decimal('bought_price')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('tax_rate')->nullable();
            $table->decimal('tax')->nullable();
            $table->decimal('discount')->nullable();
            $table->integer('hour_price')->nullable();
            $table->integer('check_price')->nullable()->default(0);
            $table->integer('price_pre_bring')->nullable();
            $table->integer('company_profit_rate')->nullable();
            $table->decimal('total_price')->nullable();
            $table->decimal('company_profits')->nullable();
            $table->decimal('provider_profit')->nullable();
            $table->decimal('total_provider_money')->nullable();
            $table->boolean('is_pay_complete')->nullable();
            $table->json('payment_data')->nullable();

            $table->decimal('lat', 10, 4);
            $table->decimal('lng', 10, 4);

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('order_images', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('image');
            $table->integer('size');
            $table->string('ext');
            $table->enum('type', ['bill', 'check'])->default('bill');
            $table->timestamps();
        });

        Schema::create('order_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('type');
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
        Schema::dropIfExists('order_status');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_images');
        Schema::dropIfExists('order_histories');
    }
}
