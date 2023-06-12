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
        Schema::create('chq_book_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->string('bank_acc_no')->references('bank_acc_no')
            ->on('bank_acc_infos');
            $table->string('chq_prefix');
            $table->unsignedBigInteger('chq_book_no');
            $table->unsignedBigInteger('begining_sl_no');
            $table->unsignedBigInteger('ending_sl_no');
            $table->integer('leaf_type_code')->references('leaf_type_code')
            ->on('sl_leaf_quantities');
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
        Schema::dropIfExists('chq_book_infos');
    }
};
