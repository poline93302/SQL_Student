<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IntercorCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inter_cor_table', function (Blueprint $table) {
            $table->increments('id')         ->comment('流水號');
            $table->string('teach_id')     ->comment('導師id');
            $table->string('stud_id')        ->comment('學號');
            $table->string('form_id')        ->comment('表單編號');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inter_cor_table');
    }
}