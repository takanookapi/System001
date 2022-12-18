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
        Schema::table('Member', function (Blueprint $table) {
            $table->foreign(['MemberClassID'], 'Member_FK_MemberClassID')->references(['MemberClassID'])->on('MemberClass')->onUpdate('CASCADE');
            $table->foreign(['StatusID'], 'Member_FK_MemberStatusID')->references(['StatusID'])->on('MemberStatus')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Member', function (Blueprint $table) {
            $table->dropForeign('Member_FK_MemberClassID');
            $table->dropForeign('Member_FK_MemberStatusID');
        });
    }
};
