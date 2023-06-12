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
        Schema::create('nominee_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('acc_no')->references('acc_no')
            ->on('account_infos');
            $table->string('nominee_name');
            $table->unsignedBigInteger('nominee_NID');
            $table->unsignedBigInteger('nominee_mobile_no');
            $table->string('nominee_relation');
            $table->string('nominee_share')->nullable();
            $table->date('nominee_status_date')->nullable();
            $table->string('nominee_status_ref')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // $table->foreign('account_infos_id')
            // ->references('id')
            // ->on('account_infos');

            
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
        Schema::dropIfExists('nominee_infos');
    }
};
