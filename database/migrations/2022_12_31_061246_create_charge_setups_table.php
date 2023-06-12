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
        Schema::create('charge_setups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('product_id')->references('id')
            ->on('prod_service_setups');
            $table->char('sl_charge_type_id')->references('id')
            ->on('sl_charge_types');
            $table->char('sl_charge_pay_method_id')->references('id')
            ->on('sl_charge_pay_methods');
            $table->char('sl_charge_pay_period_id')->references('id')
            ->on('sl_charge_pay_periods');
            $table->double('charge_amt',15,2);
            $table->char('gl_acc_code_id')->references('id')
            ->on('gl_acc_codes');
            $table->date('effect_date');
            $table->tinyInteger('active_flag')->default(1);
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
        Schema::dropIfExists('charge_setups');
    }
};
