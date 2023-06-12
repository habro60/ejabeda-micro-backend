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
        Schema::create('penalty_rate_setups', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('product_id');
            $table->char('sl_penalty_type_id')->references('id')
            ->on('sl_penalty_types');
            $table->char('sl_penalty_pay_method_id')->references('id')
            ->on('sl_penalty_pay_methods');
            $table->char('sl_penalty_cal_method_id')->references('id')
            ->on('sl_penalty_cal_methods');
            $table->double('penalty_rate',5,2)->nullable();
            $table->double('maxi_penalty_amt',15,2)->nullable();
            $table->char('gl_acc_code_id')->references('id')
            ->on('gl_acc_codes');
            $table->date('effect_date');
            $table->tinyInteger('active_flag')->nullable();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();


            // $table->foreign('sl_penalty_type_id')
            // ->references('id')
            // ->on('sl_penalty_types');

            // $table->foreign('sl_penalty_pay_method_id')
            // ->references('id')
            // ->on('sl_penalty_pay_methods');
                       
            // $table->foreign('sl_penalty_cal_method_id')
            // ->references('id')
            // ->on('sl_penalty_cal_methods');
            
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
        Schema::dropIfExists('penalty_rate_setups');
    }
};
