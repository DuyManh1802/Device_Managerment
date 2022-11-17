<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceusedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deviceused', function (Blueprint $table) {
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('device_id');
            $table->integer('amount_used')->default(0);
            $table->timestamps();
            $table->primary(['department_id', 'device_id']);
            $table->foreign('department_id')->references('id')->on('department')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('device_id')->references('id')->on('device')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deviceused');
    }
}
