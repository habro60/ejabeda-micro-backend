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
        Schema::create('holidays', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('holiday_type')->references('id')
            ->on('sl_holiday_types');
            $table->string('holiday_name');
            $table->date('holiday_date');
            $table->tinyInteger('status')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();  
            $table->timestamps();
            
            // $table->foreign('office_id')
            // ->references('id')
            // ->on('office_infos');

            // $table->foreign('holiday_type')
            // ->references('id')
            // ->on('sl_holiday_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('holidays');
    }
};
