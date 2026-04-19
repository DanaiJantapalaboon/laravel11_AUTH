<?php

namespace Database\Seeders;

use App\Models\Company;
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
            'name' => 'ท่านยังไม่ได้ตั้งชื่อโปรแกรม',
            'name2' => 'ท่านยังไม่ได้ตั้งชื่อหน่วยงาน/บริษัท',
            'tax' => rand(1000000000000, 9999999999999),
            'address' => 'ท่านยังไม่ได้ตั้งค่าที่อยู่',
            'email' => 'admin01@admin',
            'tel1' => '0897078209',
            'tel2' => '0890000000'
        ]);
    }
}
