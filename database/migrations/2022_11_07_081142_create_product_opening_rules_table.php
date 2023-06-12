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
        Schema::create('product_opening_rules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('product_id')->references('id')
            ->on('prod_service_setups')
            ->onDelete('cascade');
            $table->tinyInteger('direct_open')->default(0);
            $table->tinyInteger('must_have_other_acc')->default(0);
            $table->tinyInteger('allow_opening_fee')->default(0);
            $table->tinyInteger('need_group_leader')->default(0);
            $table->tinyInteger('introducer_info')->default(0);
            $table->tinyInteger('guarantor_info')->default(0);
            $table->tinyInteger('nominee_info')->default(0);
            $table->tinyInteger('security_info')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // $table->foreign('product_id')
            // ->references('id')
            // ->on('prod_service_setups')
            // ->onDelete('cascade');
            
            // $table->foreign('office_id')
            // ->references('id')
            // ->on('office_infos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_opening_rules');
    }
};
