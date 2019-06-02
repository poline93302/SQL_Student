<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_table', function (Blueprint $table) {
            $table->increments('id')         ->comment('流水號');
            $table->string('teach_name')     ->comment('導師姓名');
            $table->string('stud_depart')    ->comment('部門');
            $table->string('stud_id')        ->comment('學號');
            $table->string('stud_name')      ->comment('學生姓名');
            $table->string('stud_sex')       ->comment('學生性別');
            $table->string('stud_address')   ->comment('地址');
            $table->string('stud_mo')        ->comment('母親姓名');
            $table->string('stud_fa')        ->comment('父親姓名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_table');
    }
}
