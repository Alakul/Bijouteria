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
        $admin=new \App\Models\Admin();
        $admin->password=bcrypt('12345678');
        $admin->email='admin@gmail.com';
        $admin->save();
    }
}
