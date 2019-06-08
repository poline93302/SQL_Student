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
            $table->increments('id')               ->comment('流水號');
            $table->string('form_id')              ->comment('表單編號');
            $table->dateTime('inter_time')         ->comment('訪談時間');
            $table->binary('inter_file')           ->nullable()->comment('檔案');
            $table->string('form_item_res')        ->nullable()->comment('表單項目-人際關係');
            $table->string('form_item_ass')        ->nullable()->comment('表單項目-異性交往');
            $table->string('form_item_fam')        ->nullable()->comment('表單項目-家庭狀況');
            $table->string('form_item_emo')        ->nullable()->comment('表單項目-情緒困擾');
            $table->string('form_item_sub')        ->nullable()->comment('表單項目-課業學習');
            $table->string('form_item_car')        ->nullable()->comment('表單項目-生涯議題');
            $table->string('form_item_phy')        ->nullable()->comment('表單項目-生理健康');
            $table->string('form_item_oth')        ->nullable()->comment('表單項目-其他');
            $table->string('form_cont_ste')        ->nullable()->comment('表單內容-持續關懷');
            $table->string('form_cont_hep')        ->nullable()->comment('表單項目-轉介學輔中心');
            $table->string('form_cont_oth')        ->nullable()->comment('表單項目-其他');
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