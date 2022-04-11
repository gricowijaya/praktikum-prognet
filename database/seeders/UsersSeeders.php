<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
          [
            'name'=>'Dadang',
            'email'=>'dadang@gmail.com',
            'status'=>'active',
            'password'=> '123123',
          ],
        ]);
    }
}
