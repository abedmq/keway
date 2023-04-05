<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCancelReasonsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cancel_reasons', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description')->nullable();

            $table->integer('language_id')->default(1);
            $table->integer('parent_id')->default(0);
            $table->integer('admin_id')->default(1);
            $table->integer('sort')->default(5);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        \App\Models\CancelReason::create([
            'title'=>'too late',
            'description'=>'too late too late',
        ]);

        \App\Models\CancelReason::create([
            'title'=>'to expensive',
            'description'=>'to expensive',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancel_reasons');
    }
}
