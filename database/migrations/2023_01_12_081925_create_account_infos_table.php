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
        Schema::create('account_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id');
            $table->unsignedBigInteger('user_id')->references('id')
            ->on('users');
            $table->char('prod_service_setup_id')->references('id')
            ->on('prod_service_setups');
            $table->char('acc_no')->unique();
            $table->char('other_account_number')->nullable();
            $table->string('acc_name');
            $table->double('opening_fee',15,2)->default(0)->nullable();
            $table->string('introducer_name')->nullable();
            $table->date('acc_open_date');
            $table->char('sl_acc_status_id')->references('id')
            ->on('sl_acc_statuses');
            $table->date('acc_status_date');
            $table->string('acc_status_ref')->nullable();
            $table->char('sl_deposit_period_id')->references('id')
            ->on('sl_deposit_periods')->nullable();
            $table->string('nid_doc')->nullable();
            $table->string('passport_doc')->nullable();
            $table->string('birth_certificate_doc')->nullable();
            $table->string('tin_doc')->nullable();
            $table->double('deposit_amt',15,2)->default(0.00)->nullable();
            $table->integer('no_of_deposit')->nullable();
            $table->integer('per_deposit')->nullable();
            $table->double('loan_limit',15,2)->default(0.00)->nullable();
            $table->double('loan_section_amt',15,2)->default(0.00)->nullable();
            $table->double('loan_instalment_amt',15,2)->default(0.00)->nullable();
            $table->integer('number_of_instalment')->nullable();
            $table->tinyInteger('status')->default(true);
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
        Schema::dropIfExists('account_infos');
    }
};
