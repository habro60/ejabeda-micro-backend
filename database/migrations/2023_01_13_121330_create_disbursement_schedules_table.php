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
        Schema::create('disbursement_schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('office_id')->references('id')
            ->on('office_infos');
            $table->char('acc_no')->references('acc_no')
            ->on('account_infos');
            $table->double('total_disburse_amt',15,2);
            $table->integer('disburs_phase');
            $table->double('disburse_amt',15,2);
            $table->date('disburs_date');
            $table->double('number_of_disbuse',5);
            $table->date('effect_date');
            $table->string('status')->nullable();
            $table->tinyInteger('active_status')->default('1');
         
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
        Schema::dropIfExists('disbursement_schedules');
    }
};
