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
        Schema::create('branch_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
                ->on('office_infos');
            $table->string('branch_name');
            $table->string('branch_routing_no');
            $table->string('branch_add');
            $table->string('branch_no')->unique();
            $table->string('branch_email');
            $table->string('branch_mobil_no');
            $table->string('bank_no')->references('bank_no')
                ->on('bank_infos');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            // $table->foreign('bank_info_id')
            // ->references('id')
            // ->on('bank_infos');

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
        Schema::dropIfExists('branch_infos');
    }
};
