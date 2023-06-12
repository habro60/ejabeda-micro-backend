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
        Schema::create('product_deposit_rules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('product_id')->references('id')
            ->on('prod_service_setups')
            ->onDelete('cascade');
            $table->double('min_deposit_amt',15,2)->default(0);
            $table->double('max_deposit_amt',15,2)->default(0);
            $table->tinyInteger('deposit_on_demand')->default(0);
            $table->tinyInteger('deposit_frequent_intervel')->default(0);
            $table->double('min_withdrawal_amt',15,2)->default(0);
            $table->double('max_withdrawal_amt',15,2)->default(0);
            $table->tinyInteger('withdrawal_on_demand')->default(0);
            $table->tinyInteger('withdrawal_at_onece')->default(0);
            $table->tinyInteger('withdrawal_frequent_interval')->default(0);
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
        Schema::dropIfExists('product_deposit_rules');
    }
};
