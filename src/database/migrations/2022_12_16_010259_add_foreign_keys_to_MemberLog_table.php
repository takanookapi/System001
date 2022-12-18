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
        Schema::table('MemberLog', function (Blueprint $table) {
            $table->foreign(['MemberID'], 'MemberLog_FK_MemberID')->references(['MemberID'])->on('Member')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('MemberLog', function (Blueprint $table) {
            $table->dropForeign('MemberLog_FK_MemberID');
        });
    }
};
