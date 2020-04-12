<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 29)->create();

        App\User::create([
            'name' => 'AdminMaster',
            'email' => 'master@admin.com',
            'password' => bcrypt('admin12340')
        ]);
    }
}
