<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'zhanglinhao',
            'email' => '310462549@qq.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
