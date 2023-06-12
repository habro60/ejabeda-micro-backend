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
        Schema::create('sl_emp_desigs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('office_id')->references('id')
            ->on('office_infos');
            $table->string('title');
            $table->integer('desig_type_code');
            $table->unsignedBigInteger('application_type');
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
        Schema::dropIfExists('sl_emp_desigs');
    }
};
