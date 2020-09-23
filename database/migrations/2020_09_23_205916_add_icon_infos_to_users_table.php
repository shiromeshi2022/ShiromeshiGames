<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconInfosToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('icon_url', 255)->default('icon_normal.png');
            $table->boolean('unlock_icon_girl')->default('0');
            $table->boolean('unlock_icon_salaryman')->default('0');
            $table->boolean('unlock_icon_salarywoman')->default('0');
            $table->boolean('unlock_icon_sennnin')->default('0');
            $table->boolean('unlock_icon_shinpu')->default('0');
            $table->boolean('unlock_icon_student')->default('0');
            $table->boolean('unlock_icon_queen')->default('0');
            $table->boolean('unlock_icon_fukusuke')->default('0');
            $table->boolean('unlock_upload_img')->default('0');
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
            //
        });
    }
}
