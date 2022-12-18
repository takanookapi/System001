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
        Schema::create('MailLog', function (Blueprint $table) {
            $table->comment('');
            $table->integer('MailLogID', true);
            $table->string('MailFrom', 200)->nullable();
            $table->string('MailTo', 200)->nullable();
            $table->text('Subject')->nullable();
            $table->text('Body')->nullable();
            $table->dateTime('Created')->nullable();
            $table->string('CreatedBy', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MailLog');
    }
};
