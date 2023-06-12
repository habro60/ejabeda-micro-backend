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
        Schema::create('chq_leaf_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->string('bank_acc_no')->references('bank_acc_no')
            ->on('bank_acc_infos');
            $table->unsignedBigInteger('chq_book_no')->references('chq_book_no')
            ->on('chq_book_infos');
            $table->string('chq_prefix');
            $table->unsignedBigInteger('leaf_sl_no');
            $table->unsignedBigInteger('leaf_status')->nullable();
            $table->date('status_date')->nullable();
            $table->unsignedBigInteger('application_type')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
           
            // $table->foreign('bank_acc_info_id')
            // ->references('id')
            // ->on('bank_acc_infos');

            // $table->foreign('chq_book_info_id')
            // ->references('id')
            // ->on('chq_book_infos');
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
        Schema::dropIfExists('chq_leaf_infos');
    }
};
