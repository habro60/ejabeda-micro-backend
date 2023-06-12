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
        Schema::create('product_transaction_rules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('product_id')->references('id')
            ->on('prod_service_setups')
            ->onDelete('cascade');
            $table->tinyInteger('need_varification')->default(0);
            $table->tinyInteger('allow_dr_tran')->default(0);
            $table->tinyInteger('allow_cr_tran')->default(0);
            $table->tinyInteger('allow_over_due_tran')->default(0);
            $table->tinyInteger('allow_cash_tran')->default(0);
            $table->tinyInteger('allow_clearing_tran')->default(0);
            $table->tinyInteger('allow_transfer_tran')->default(0);
            $table->tinyInteger('allow_negative_balance')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // $table->foreign('product_id')
            // ->references('id')
            // ->on('prod_service_setups')
            // ->onDelete('cascade');
            
            // $table->foreign('office_id')
            // ->references('id')
            // ->on('office_infos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_transaction_rules');
    }
};
