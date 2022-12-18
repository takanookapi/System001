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
        Schema::table('ArticleCategory', function (Blueprint $table) {
            $table->foreign(['StatusID'], 'ArticleCategory_FK_ArticleCategoryStatusID')->references(['StatusID'])->on('ArticleCategoryStatus')->onUpdate('CASCADE');
            $table->foreign(['ArticleClassID'], 'ArticleCategory_FK_ArticleClassID')->references(['ArticleClassID'])->on('ArticleClass')->onUpdate('CASCADE');
            $table->foreign(['MemberID'], 'ArticleCategory_FK_Member')->references(['MemberID'])->on('Member')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ArticleCategory', function (Blueprint $table) {
            $table->dropForeign('ArticleCategory_FK_ArticleCategoryStatusID');
            $table->dropForeign('ArticleCategory_FK_ArticleClassID');
            $table->dropForeign('ArticleCategory_FK_Member');
        });
    }
};
