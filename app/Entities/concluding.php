<?php


namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class concluding extends Authenticatable
{
    use  Notifiable;
    protected $table = 'student_have_res';
//    protected $fillable = [
//    ];
//  guarded => 黑名單 ＝null fillable=>白名單
    protected $guarded = [];
//  hidden => 需隱藏資料欄位
    protected $hidden =[];

    public $timestamps = false;
}