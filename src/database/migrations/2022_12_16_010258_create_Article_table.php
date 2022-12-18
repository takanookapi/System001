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
        Schema::create('Article', function (Blueprint $table) {
            $table->comment('');
            $table->integer('ArticleID', true);
            $table->integer('ArticleCategoryID')->index('Article_FK_ArticleCategoryID_idx');
            $table->string('Caption', 45);
            $table->integer('MemberID')->nullable()->index('Article_FK_MemberID_idx');
            $table->date('DisplayFrom')->nullable();
            $table->date('DisplayTo')->nullable();
            $table->string('LinkURL', 200)->nullable();
            $table->string('LinkCaption', 200)->nullable();
            $table->string('Image01', 200)->nullable();
            $table->string('Image02', 200)->nullable();
            $table->string('Image03', 200)->nullable();
            $table->string('Image04', 200)->nullable();
            $table->string('Image05', 200)->nullable();
            $table->text('Description')->nullable();
            $table->integer('StatusID')->index('Article_FK_ArticleStatus_idx');
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
        Schema::dropIfExists('Article');
    }
};
