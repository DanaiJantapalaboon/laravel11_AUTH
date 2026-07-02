<?php

namespace Database\Seeders;

use App\Models\Settings_position;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings_position::create([
            'name' => 'ไปที่ตั้งค่าและกำหนดตำแหน่ง',
            'updated_by' => 1
        ]);
    }
}
