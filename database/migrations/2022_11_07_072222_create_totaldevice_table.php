<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotaldeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('totaldevice', function (Blueprint $table) {
            $table->unsignedBigInteger('depot_id');
            $table->unsignedBigInteger('device_id');
            $table->integer('total_device')->default(0);
            $table->string('warranty_period');
            $table->timestamps();
            $table->primary(['depot_id', 'device_id']);
            $table->foreign('depot_id')->references('id')->on('depot')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('totaldevice');
    }
}
