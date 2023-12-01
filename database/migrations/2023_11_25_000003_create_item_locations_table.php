<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('item_id')->default(1);
            $table->foreignId('department_id')->default(1);
            $table->bigInteger('location_id')->default(1);
            $table->integer('quantity');
            $table->longText('description');

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
        Schema::dropIfExists('item_locations');
    }
};
