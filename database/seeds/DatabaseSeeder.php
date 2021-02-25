<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;

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

        User::create([
            'name' => 'Teddius Maingi',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Password1234'),
            'role_id' => Role::where('slug','administrator')->pluck('id')->first(),
            'phone_number' => '0712345678',
            'gender' => 'male',
        ]);
    }
}
