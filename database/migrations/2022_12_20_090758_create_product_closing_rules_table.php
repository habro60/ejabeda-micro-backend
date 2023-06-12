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
        Schema::create('product_closing_rules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('product_id')->references('id')
            ->on('prod_service_setups')
            ->onDelete('cascade');
            $table->tinyInteger('balence_must_be_zero')->default(0);
            $table->tinyInteger('close_on_maturity')->default(0);
            $table->tinyInteger('close_on_status')->default(0);
            $table->tinyInteger('closing_fee')->default(0);
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
        Schema::dropIfExists('product_closing_rules');
    }
};
