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
        Schema::create('org_infos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('org_number');
            $table->string('org_name');
            $table->integer('geo_divisions_id')->nullable();
            $table->integer('geo_districts_id')->nullable();
            $table->integer('geo_upazilas_id')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_no');
            $table->string('db_name');
            $table->string('db_username');
            $table->string('db_password')->nullable();
            $table->string('email');
            $table->string('status_date');
            $table->string('validity_period')->default(30);
            $table->string('expiry_date');
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
        Schema::dropIfExists('org_infos');
    }
};
