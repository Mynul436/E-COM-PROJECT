<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $adminRecords = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'type' => 'superadmin',
                'mobile' => '1234567890',
                'email' => 'superadmin@gmail.com',
                'vendor_id' => 0,
                'password' => '$2a$12$hFd7qMEhjF2HTbyTR3YYC.rqS7b8hYpJpwxjTfBxpP9fYKgAgaApG',
                'image' => '',
                'status' => 1,
            ]] ;

        Admin::insert($adminRecords);
    }
}
