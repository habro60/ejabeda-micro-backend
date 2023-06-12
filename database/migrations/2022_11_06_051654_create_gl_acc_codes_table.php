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
        Schema::create('gl_acc_codes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('office_id')->references('id')
            ->on('office_infos');
            $table->char('category_id')->references('id')
            ->on('sl_acc_categories');
            $table->char('acc_type_id') ->references('id')
            ->on('sl_acc_types'); 
            $table->char('parent_id');
            $table->string('acc_head');
            $table->string('acc_code');
            $table->string('postable_acc')->comment('group/ledger');
            $table->string('subsidiary_group_code');
            $table->bigInteger('rep_glcode')->default(0)->nullable();
            $table->tinyInteger('is_ho_acc')->default(0)->nullable();  
            $table->bigInteger('contra_acc_code')->nullable();
            $table->string('remarks')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->date('status_date')->default(null);
            $table->string('create_by')->nullable();
            $table->string('modifide_by')->nullable();
            $table->timestamps();

            // $table->foreignUuid('category_id')
            

            // $table->foreignUuid('acc_type_id')
            // ->references('id')
            // ->on('sl_acc_types');

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
        Schema::dropIfExists('gl_acc_codes');
    }
};
