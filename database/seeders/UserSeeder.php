<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $users = [
                [
                    'nama' => 'Super Admin',
                    'email' => 'superadmin@gmail.com',
                    'password' => bcrypt('admin'),
                    'jabatan' => 'Super Admin', 
                    'role' => 'superadmin'
                ],
                [
                    'nama' => 'Atasan IT',
                    'email' => 'AtasanIT@gmail.com',
                    'password' => bcrypt('admin'),
                    'jabatan' => 'Svp.IT', 
                    'role' => 'atasan it'
                ],
                [
                    'nama' => 'Pengecekan IT',
                    'email' => 'PengecekanIT@gmail.com',
                    'password' => bcrypt('admin'),
                    'jabatan' => 'IT Maintenance', 
                    'role' => 'it'
                ],
                [
                    'nama' => 'user',
                    'email' => 'User@gmail.com',
                    'password' => bcrypt('admin'),
                    'jabatan' => 'Staf IT', 
                    'role' => 'user'
                ]
            ];
            User::insert($users);
        }
    }