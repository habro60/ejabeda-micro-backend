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
        Schema::create('int_rate_setups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('product_id');
            $table->char('sl_int_type_id')->references('id')
            ->on('sl_int_types');
            $table->char('sl_int_cal_method_id') ->references('id')
            ->on('sl_int_cal_methods');
            $table->char('sl_prod_cal_method_id')->references('id')
            ->on('sl_prod_cal_methods');
            $table->char('sl_int_apply_period_id')->references('id')
            ->on('sl_int_apply_periods');
            $table->double('int_rate',5,2);
            $table->char('gl_acc_code_id')->references('id')
            ->on('gl_acc_codes');
            $table->date('effect_date');
            $table->tinyInteger('active_flag')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();


            // $table->foreign('sl_int_type_id')
            // ->references('id')
            // ->on('sl_int_types');

            // $table->foreign('sl_int_cal_method_id')
            // ->references('id')
            // ->on('sl_int_cal_methods');
            
            // $table->foreign('sl_prod_cal_method_id')
            // ->references('id')
            // ->on('sl_prod_cal_methods');
            
            // $table->foreign('sl_int_apply_period_id')
            // ->references('id')
            // ->on('sl_int_apply_periods');
            
            // $table->foreign('gl_acc_code_id')
            // ->references('id')
            // ->on('gl_acc_codes');

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
        Schema::dropIfExists('int_rate_setups');
    }
};
