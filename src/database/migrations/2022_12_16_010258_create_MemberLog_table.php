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
        Schema::create('MemberLog', function (Blueprint $table) {
            $table->comment('');
            $table->integer('LogID', true);
            $table->integer('MemberID')->nullable()->index('MemberLog_FK_MemberID_idx');
            $table->string('Action', 45);
            $table->string('UserAgent', 200)->nullable();
            $table->string('RemoteAddress', 45)->nullable();
            $table->dateTime('Created');
            $table->string('CreatedBy', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MemberLog');
    }
};
