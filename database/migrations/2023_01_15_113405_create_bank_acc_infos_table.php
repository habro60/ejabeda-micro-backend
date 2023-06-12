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
        Schema::create('bank_acc_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->string('bank_acc_no')->unique();
            $table->string('acc_code')->unique();
            $table->string('acc_title');
            $table->date('acc_open_date'); 
            $table->string('bank_no')->references('bank_no')
            ->on('bank_infos');
            $table->string('branch_no')->references('branch_no')
            ->on('branch_infos');
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
        Schema::dropIfExists('bank_acc_infos');
    }
};
