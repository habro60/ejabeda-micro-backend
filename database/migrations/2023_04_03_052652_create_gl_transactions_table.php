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
        Schema::create('gl_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')->on('office_infos');
            $table->date('trn_date');
            $table->char('acc_no')->references('acc_code')->on('gl_acc_codes');
            $table->unsignedBigInteger('trn_no');
            $table->unsignedBigInteger('batch_no');
            $table->char('trn_mode_code')->references('trn_mode_code')
            ->on('sl_trn_modes');
            $table->char('trn_type_code')->references('trn_type_code')
            ->on('sl_trn_types');
            $table->char('vch_type_code')->references('vch_type_code')
            ->on('sl_vch_types');
            $table->double('dr_loc_amt');
            $table->double('cr_loc_amt');
            $table->double('dr_fc_amt');
            $table->double('cr_fc_amt');
            $table->double('exchange_rate')->default(0.00)->nullable();
            $table->string('particulars');
            $table->string('chq_no')->nullable();
            $table->date('chq_date')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->integer('post_flag')->nullable();        
            $table->unsignedBigInteger('posted_by')->nullable();
            $table->unsignedBigInteger('varified_by')->nullable(); 

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
        Schema::dropIfExists('gl_transactions');
    }
};
