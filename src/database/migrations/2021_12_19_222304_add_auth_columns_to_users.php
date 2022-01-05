<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAuthColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('family_name')->after('id')->comment('名字')->nullable();
            $table->string('given_name')->after('family_name')->comment('名前')->nullable();
            $table->string('family_name_kana')->after('given_name')->comment('名字(かな)')
                ->nullable();
            $table->string('given_name_kana')->after('family_name_kana')->comment('名前(かな)')
                ->nullable();
            $table->timestamp('last_logged_at')->after('given_name_kana')->comment('最終ログイン日')
                ->nullable();
            $table
                ->unsignedBigInteger('current_tutoring_school_id')
                ->after('last_logged_at')
                ->comment('ログイン中の塾ID')
                ->nullable();
            $table
                ->unsignedBigInteger('team_id')
                ->after('current_tutoring_school_id')
                ->comment('チームID')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'family_name',
                'given_name',
                'family_name_kana',
                'given_name_kana',
                'last_logged_at',
                'current_tutoring_school_id',
                'team_id',
            ]);
        });
    }
}
