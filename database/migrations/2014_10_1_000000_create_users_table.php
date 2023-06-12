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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('org_number');
            $table->unsignedBigInteger('office_number');
            $table->string('email')->unique();
            $table->string('posting_date')->nullable();
            $table->unsignedBigInteger('posting_place')->nullable();
            $table->string('db_name');
            $table->string('db_username');
            $table->string('db_password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('sl_user_group_id');
            $table->unsignedBigInteger('sl_role_type_id');
            $table->tinyInteger('status')->default(1);
            // $table->foreign('sl_user_group_id')
            // ->references('id')
            // ->on('sl_user_groups');
            
            // $table->foreign('sl_role_type_id')
            // ->references('id')
            // ->on('sl_role_types');

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
        Schema::dropIfExists('users');
    }
};
