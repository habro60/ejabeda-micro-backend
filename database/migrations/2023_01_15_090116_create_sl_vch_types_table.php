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
        Schema::create('sl_vch_types', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('vch_type_code')->unique();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->string('title');
            $table->unsignedBigInteger('application_type');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
           
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
        Schema::dropIfExists('sl_vch_types');
    }
};
