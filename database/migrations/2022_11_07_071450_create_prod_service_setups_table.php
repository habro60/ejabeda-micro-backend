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
        Schema::create('prod_service_setups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('prod_code')->unique();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('gl_acc_id')->references('id')
            ->on('gl_acc_codes');
            $table->string(('product_name'));
            $table->char('product_category')->references('id')
            ->on('sl_product_categories');
            $table->char('parent_id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('prod_service_setups');
    }
};
