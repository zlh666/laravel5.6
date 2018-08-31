<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Admin::class)->create([
            'name' => 'root',
            'email' => '310462549@qq.com',
            'password' => bcrypt('root'),
        ]);
    }
}
