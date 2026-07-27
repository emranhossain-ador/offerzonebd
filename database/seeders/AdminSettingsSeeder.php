<?php

namespace Database\Seeders;

use App\Models\AdminSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'is_drive_active' => true
            ]
        ];

        AdminSettings::insert($data);
    }
}
