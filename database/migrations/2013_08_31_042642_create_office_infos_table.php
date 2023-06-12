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
        Schema::create('office_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('org_number');
            $table->unsignedBigInteger('office_number');
            $table->string('office_name');
            $table->integer('geo_divisions_id')->nullable();
            $table->integer('geo_districts_id')->nullable();
            $table->integer('geo_upazilas_id')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_no');
            $table->string('email');
            $table->char('office_type_id')->references('id')
            ->on('sl_office_types');
            $table->char('parent_id')->nullable();
            $table->string('status_date');
            $table->string('validity_period')->default(30);
            $table->string('expiry_date')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('deletable')->default(1);
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
        Schema::dropIfExists('office_infos');
    }
};
