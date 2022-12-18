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
        Schema::create('laraveltemInfo', function (Blueprint $table) {
            $table->comment('');
            $table->string('Key', 50)->primary();
            $table->string('Value', 200);
            $table->text('Description')->nullable();
            $table->dateTime('Created');
            $table->string('CreatedBy', 100);
            $table->dateTime('Updated');
            $table->string('UpdatedBy', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laraveltemInfo');
    }
};
