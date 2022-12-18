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
        Schema::table('ArticleTag', function (Blueprint $table) {
            $table->foreign(['ArticleID'], 'Article_FK_ArticleID')->references(['ArticleID'])->on('Article')->onUpdate('CASCADE');
            $table->foreign(['TagID'], 'Tag_FK_TagID')->references(['TagID'])->on('Tag')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ArticleTag', function (Blueprint $table) {
            $table->dropForeign('Article_FK_ArticleID');
            $table->dropForeign('Tag_FK_TagID');
        });
    }
};
