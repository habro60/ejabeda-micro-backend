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
        Schema::create('user_detail_infos', function (Blueprint $table) {
            $table->id();
            $table->char('office_id');
            $table->unsignedBigInteger('user_id');
            $table->string('user_number')->unique();
            $table->unsignedBigInteger('under_team_lead')->nullable();
            $table->tinyInteger('is_team_lead')->default(0)->nullable();
            $table->string('full_name');
            $table->string('contact_no');
            $table->date('date_of_birth');
            $table->string('father_name')->default('N/A')->nullable();
            $table->string('mother_name')->default('N/A')->nullable();
            $table->string('pause_name')->default('N/A')->nullable();
            $table->string('image')->default('N/A')->nullable();
            $table->string('present_address')->default('N/A')->nullable();
            $table->string('permenant_address')->default('N/A')->nullable();
            $table->string('NID')->default('N/A')->nullable();
            $table->string('profession')->default('N/A')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


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
        Schema::dropIfExists('user_detail_infos');
    }
};
