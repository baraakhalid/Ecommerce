<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_coupons', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();
            $table->string('type');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('value')->nullable();
            $table->unsignedBigInteger('uses_times')->nullable();
            $table->unsignedBigInteger('used_times')->default(0);
            $table->unsignedDecimal('greater_than')->nullable();
            $table->date('start_date');
            $table->date('expire_date');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('product_coupons');
    }
}
