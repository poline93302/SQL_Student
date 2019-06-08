<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacher_table')->delete();

        \App\Entities\Teacher::create([
            'teach_name'      => '林老師',
            'teach_class'     => '怕',
            'teach_id'        => '123456',
            'password'          => Hash::make('123456')
        ]);
    }
}
