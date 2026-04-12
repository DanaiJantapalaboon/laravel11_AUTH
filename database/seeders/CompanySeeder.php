<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => Str::random(30),
            'tax' => rand(1000000000000, 9999999999999),
            'address' => Str::random(100),
            'email' => 'admin01@admin',
            'tel1' => '0897078209',
            'tel2' => '0890000000'
        ]);
    }
}
