<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InterproidCreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inter_pro_id_table', function (Blueprint $table) {
            $table->integer('inter_pro_id')        ->comment('訪談項目編號');
            $table->string('inter_pro')        ->comment('訪談項目');
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
        Schema::drop('inter_pro_id_table');
    }
}