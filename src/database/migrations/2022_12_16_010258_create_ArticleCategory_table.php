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
        Schema::create('ArticleCategory', function (Blueprint $table) {
            $table->comment('');
            $table->integer('ArticleCategory', true);
            $table->integer('ArticleClassID')->index('ArticleCategory_FK_ArticleClassID_idx');
            $table->string('Caption', 45);
            $table->integer('MemberID')->nullable()->index('ArticleCategory_FK_Member_idx');
            $table->string('Image01', 200)->nullable();
            $table->text('Description')->nullable();
            $table->integer('StatusID')->index('ArticleCategory_FK_ArticleCategoryStatusID_idx');
            $table->integer('Priority');
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
        Schema::dropIfExists('ArticleCategory');
    }
};
