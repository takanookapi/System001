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
        Schema::create('ArticleTag', function (Blueprint $table) {
            $table->comment('');
            $table->integer('ArticleID');
            $table->integer('TagID')->index('Tag_FK_TagID_idx');

            $table->primary(['ArticleID', 'TagID']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ArticleTag');
    }
};
