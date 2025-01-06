<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_mail');
            $table->string('company');
            $table->string('address');
            $table->string('item');
            $table->string('product_name');
            $table->string('price');
            $table->integer('quantity');
            $table->string('total');
            $table->string('payment');
            $table->string('due');
            $table->timestamps();
            /*
id	customer_name	customer_mail	company	address	item	product_name	price	quantity	total	payment	due	created_at	updated_at	 -> invoices */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
