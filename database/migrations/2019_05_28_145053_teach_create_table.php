<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TeachCreateTable extends Migration
{
    /**
     * Run the migrations.
     *                                     teach_class
     *                                      teach_name
     *                                      teach_id
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_table', function (Blueprint $table) {
            $table->increments('id')        ->comment('流水號');
            $table->string('teach_name')    ->comment('導師姓名');
            $table->string('teach_class')   ->comment('授課班級');
            $table->string('teach_id')      ->comment('導師登入帳號');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teacher_table');
    }
}
