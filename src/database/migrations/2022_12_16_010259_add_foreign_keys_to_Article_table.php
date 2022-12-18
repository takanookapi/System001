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
        Schema::table('Article', function (Blueprint $table) {
            $table->foreign(['ArticleCategoryID'], 'Article_FK_ArticleCategoryID')->references(['ArticleCategory'])->on('ArticleCategory')->onUpdate('CASCADE');
            $table->foreign(['StatusID'], 'Article_FK_ArticleStatus')->references(['StatusID'])->on('ArticleStatus')->onUpdate('CASCADE');
            $table->foreign(['MemberID'], 'Article_FK_MemberID')->references(['MemberID'])->on('Member')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Article', function (Blueprint $table) {
            $table->dropForeign('Article_FK_ArticleCategoryID');
            $table->dropForeign('Article_FK_ArticleStatus');
            $table->dropForeign('Article_FK_MemberID');
        });
    }
};
