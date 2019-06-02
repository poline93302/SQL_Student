<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InterconidCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inter_con_id_table', function (Blueprint $table) {
            $table->increments('inter_con_id')        ->comment('訪談內容編號');
            $table->string('inter_con')        ->comment('訪談內容');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inter_con_id_table');
    }
}
