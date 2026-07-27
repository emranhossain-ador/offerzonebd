<?php

namespace Database\Seeders;

use App\Models\BillOperators;
use Illuminate\Database\Seeder;

class BillOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'slug' => 'palli',
                'title' => 'Palli Bidyut (prepaid)',
                'status' => 'active'
            ],
            [
                'id' => 2,
                'slug' => 'palli',
                'title' => 'Palli Bidyut (Postpaid)',
                'status' => 'active'
            ],
            [
                'id' => 3,
                'slug' => 'desco',
                'title' => 'DESCO (Prepaid)',
                'status' => 'active'
            ],
            [
                'id' => 4,
                'slug' => 'desco',
                'title' => 'DESCO (Postpaid)',
                'status' => 'active'
            ],
            [
                'id' => 5,
                'slug' => 'nesco',
                'title' => 'NESCO (Prepaid)',
                'status' => 'active'
            ],
            [
                'id' => 6,
                'slug' => 'nesco',
                'title' => 'NESCO (Postpaid)',
                'status' => 'active'
            ],
            [
                'id' => 7,
                'slug' => 'dpdc',
                'title' => 'DPDC (Prepaid)',
                'status' => 'active'
            ],
            [
                'id' => 8,
                'slug' => 'dpdc',
                'title' => 'DPDC (Postpaid)',
                'status' => 'active'
            ],
            [
                'id' => 9,
                'slug' => 'titas',
                'title' => 'Titas Gas',
                'status' => 'active'
            ],
            [
                'id' => 10,
                'slug' => 'karnaphuli',
                'title' => 'Karnaphuli Gas',
                'status' => 'active'
            ],
            [
                'id' => 11,
                'slug' => 'jalalabad',
                'title' => 'Jalalabad Gas',
                'status' => 'active'
            ],
            [
                'id' => 12,
                'slug' => 'sundarban',
                'title' => 'Sundarban Gas',
                'status' => 'active'
            ],
            [
                'id' => 13,
                'slug' => 'bakhrabad',
                'title' => 'Bakhrabad Gas',
                'status' => 'active'
            ],
            [
                'id' => 14,
                'slug' => 'amber-it',
                'title' => 'Amber IT (internet)',
                'status' => 'active'
            ],
            [
                'id' => 15,
                'slug' => 'dhaka-wasa',
                'title' => 'Dhaka WASA',
                'status' => 'active'
            ],
        ];


        BillOperators::insert($data);
        
    }
}
