<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderMoneyTransfersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_money_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id');
            $table->enum('type', ['withdraw', 'creditor', 'debit']);
            $table->decimal('amount')->default(0);
            $table->string('type_detail')->nullable();
            $table->string('withdraw_type')->nullable()->default('');
            $table->integer('order_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('provider_money_transfers');
    }
}
