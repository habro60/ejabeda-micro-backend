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
        Schema::create('loan_sanction_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('acc_no')->references('acc_no')
            ->on('account_infos');
            $table->date('sanction_date');
            $table->double('sanction_amt',15,2);
            $table->string('tenure');
            $table->double('instalment_amt',15,2);
            $table->double('number_of_installment',5);
            $table->date('effect_date');
            $table->integer('num_of_paid')->default(0);
            $table->double('total_int_paid_amt',15,2)->default(0);
            $table->double('total_principal_paid_amt',15,2)->default(0);
            $table->double('total_paid_amt',15,2)->default(0);
            $table->date('last_paid_date')->nullable();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('loan_sanction_infos');
    }
};
