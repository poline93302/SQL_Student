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
            'teach_name'      => 'Tony',
            'teach_class'     => '老大大大',
            'teach_id'        => '123',
            'password'          => Hash::make('123')
        ]);
    }
}
