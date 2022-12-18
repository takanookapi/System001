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
        Schema::create('Tag', function (Blueprint $table) {
            $table->comment('');
            $table->integer('TagID', true);
            $table->string('TagName', 45);
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
        Schema::dropIfExists('Tag');
    }
};
