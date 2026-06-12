<?php

namespace Database\Seeders;

use App\Models\Responsible;
use Illuminate\Database\Seeder;

class ResponsibleSeeder extends Seeder
{
    public function run(): void
    {
        Responsible::insert([
            ['name' => 'João Silva'],
            ['name' => 'Maria Souza'],
            ['name' => 'Pedro Santos'],
        ]);
    }
}