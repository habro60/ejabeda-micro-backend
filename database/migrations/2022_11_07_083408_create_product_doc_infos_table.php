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
        Schema::create('product_doc_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('product_id')->references('id')
            ->on('prod_service_setups')
            ->onDelete('cascade');
            $table->char('sl_document_type_id')->references('id')
            ->on('sl_document_types');
            $table->tinyInteger('type_requre');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            // $table->foreign('product_id')
            // ->references('id')
            // ->on('prod_service_setups')
            // ->onDelete('cascade');

            // $table->foreign('sl_document_type_id')
            // ->references('id')
            // ->on('sl_document_types');

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
        Schema::dropIfExists('product_doc_infos');
    }
};
