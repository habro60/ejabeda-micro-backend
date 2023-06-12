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
        Schema::create('sl_office_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('office_type_code');
            $table->string('title');
            $table->unsignedBigInteger('application_type');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

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
        Schema::dropIfExists('sl_office_types');
    }
};