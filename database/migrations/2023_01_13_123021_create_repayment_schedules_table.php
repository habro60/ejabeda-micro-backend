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
        Schema::create('repayment_schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('acc_no')->references('acc_no')
            ->on('account_infos');
            $table->double('principal_amt',15,2);
            $table->integer('no_of_instalment');
            $table->double('int_rate',15,2);
            $table->date('payment_on_date');
            $table->double('int_amt_to_pay',5,2);
            $table->double('principal_amt_to_pay',15,2);
            $table->double('total_amt_to_pay',15,2);
            
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');

           

            
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
        Schema::dropIfExists('repayment_schedules');
    }
};
