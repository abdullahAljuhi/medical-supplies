<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('pharmacy_id')->nullable();
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')->onUpdate('cascade')->onDelete('cascade');
            $table->text('products');
            $table->integer('delivery_price')->nullable();
            $table->string('address');
            $table->tinyInteger('status')->default(0);
            $table->boolean('is_show')->default(0);
            $table->integer('total_price')->default(0);
            $table->boolean('type')->default(0); // this check if order is order by image
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
        Schema::dropIfExists('orders');
    }
};
