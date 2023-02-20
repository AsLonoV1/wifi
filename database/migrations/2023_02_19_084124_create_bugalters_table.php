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
        Schema::create('bugalters', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('company_name');
            $table->string('product_title');
            $table->string('amout');
            $table->string('count');
            $table->string('meter');
            $table->string('comment')->nullable();
            $table->string('status')->default('0');
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
        Schema::dropIfExists('bugalters');
    }
};
