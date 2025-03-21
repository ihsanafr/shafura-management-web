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
        Schema::create('list_customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('customer_code');
            $table->string('website_url');
            $table->string('phone');
            $table->timestamps();
        });

        Schema::create('service_customers', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('company_name');
            $table->string('title');
            $table->string('products');
            $table->date('start_date');
            $table->date('end_date');
        });

        Schema::create('contact_customers', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('name');
            $table->string('position');
            $table->string('address');
            $table->string('email');
            $table->string('pic_phone');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_customers');
        Schema::dropIfExists('service_customers');
        Schema::dropIfExists('contact_customers');
    }
};
