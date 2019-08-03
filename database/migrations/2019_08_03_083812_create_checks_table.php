<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('userId');
            $table->unsignedInteger('breakfastRateId')->default(0);
            $table->unsignedInteger('lunchRateId')->default(0);
                $table->unsignedInteger('dinnerRateId')->default(0);
            $table->unsignedInteger('voteMenuId')->default(0);
            $table->unsignedInteger('caterId')->default(0);
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
        Schema::dropIfExists('checks');
    }
}
