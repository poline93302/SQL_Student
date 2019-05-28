<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InterCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inter_table', function (Blueprint $table) {
            $table->increments('id')         ->comment('流水號');
            $table->string('form_id')        ->comment('表單編號');
            $table->integer('inter_proid')        ->comment('訪談項目編號');
            $table->integer('inter_conid')        ->comment('訪談內容編號');
            $table->dateTime('inter_time')        ->comment('訪談時間');
            $table->binary('inter_file')        ->comment('檔案');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inter_table');
    }
}