<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'roles' =>'1',
            'password' => bcrypt('admin123#'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        // DB::table('users')->insert([
        //     'username' => 'desa',
        //     'email' => 'desa@gmail.com',
        //     'password' => bcrypt('desa#123'),
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);
    }
}
