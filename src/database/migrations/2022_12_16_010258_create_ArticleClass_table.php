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
        Schema::create('ArticleClass', function (Blueprint $table) {
            $table->comment('');
            $table->integer('ArticleClassID')->primary();
            $table->string('Caption', 45);
            $table->text('Description')->nullable();
            $table->string('Priority', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ArticleClass');
    }
};
