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
        Schema::create('guarantor_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('acc_no')->references('acc_no')
            ->on('account_infos');
            $table->string('guarantor_name');
            $table->unsignedBigInteger('guarantor_NID');
            $table->unsignedBigInteger('mobile_no');
            $table->string('address');
            $table->string('profession');
            $table->double('guarantor_amt',15,2);
            $table->date('guarantor_status_date');
            $table->string('guarantor_status_ref');
            
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
        Schema::dropIfExists('guarantor_infos');
    }
};
