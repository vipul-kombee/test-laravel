<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $roles = ['Admin', 'User', 'Manager'];
        foreach ($roles as $role) {
            \App\Models\Role::create(['name' => $role]);
        }
    }
}
