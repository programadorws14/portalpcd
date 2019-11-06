<?php

use App\Admin;
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
        Admin::updateOrCreate(
            ['id' => 1],
            [
                'id' => 1,
                'nivel' => 'admin',
                'nome' => 'Suporte',
                'email' => 'wallace.developer@live.com',
                'password' => bcrypt('W@llace.22'),
            ]
        );
    }
}
