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
        Schema::create('Member', function (Blueprint $table) {
            $table->comment('');
            $table->integer('MemberID', true);
            $table->string('MemberName', 50);
            $table->integer('MemberClassID')->index('Member_FK_MemberClassID');
            $table->string('LoginID', 20)->nullable();
            $table->string('Password', 45)->nullable();
            $table->string('Hash', 100)->nullable();
            $table->string('PostalCode', 10)->nullable();
            $table->string('Address', 200)->nullable();
            $table->string('TelNo', 15)->nullable();
            $table->string('Email', 100)->nullable();
            $table->string('Image01', 200)->nullable();
            $table->string('Image02', 200)->nullable();
            $table->string('Description', 200)->nullable();
            $table->integer('StatusID')->index('Member_FK_MemberStatusID_idx');
            $table->integer('Priority');
            $table->dateTime('Created');
            $table->string('CreatedBy', 45);
            $table->dateTime('Updated');
            $table->string('UpdatedBy', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Member');
    }
};
