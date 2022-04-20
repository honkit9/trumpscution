<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->integer('coinpair_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('entrypoint')->nullable();
            $table->string('stoploss')->nullable();
            $table->string('takeprofit')->nullable();
            $table->string('leverage')->nullable();
            $table->string('margin')->nullable();
            $table->integer('direction')->nullable()->comment('0 sell, 1 buy');
            $table->string('reason')->nullable();
            $table->integer('outcome')->default(0)->comment('0 lose, 1 win, 2 pending');
            $table->timestamp('completed_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trades');
    }
}
