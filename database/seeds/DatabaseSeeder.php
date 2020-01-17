<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        \DB::table('users')->insert([ 'id'=>'1',
                                      'name'=>'lourdes',
                                      'email'=>'Luordes Escalier',
                                      'grupo'=>'1',
                                      'password'=> bcrypt('123456')]);
    }
}
