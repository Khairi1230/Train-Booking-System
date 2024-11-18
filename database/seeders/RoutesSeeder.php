<?php

namespace Database\Seeders;

use App\Models\Routes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoutesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Routes::create(['route_name' => 'Kathmandu-pokhara','pickup'=>'Kathmandu','destination'=>'Pokhara']);
        Routes::create(['route_name' => 'kathmandu-Ilam','pickup'=>'Kathmandu','destination'=>'Ilam']);
        Routes::create(['route_name' => 'Kathmandu-Chitwan','pickup'=>'Kathmandu','destination'=>'Chitwan']);
        Routes::create(['route_name' => 'Kathmandu-Hetauda','pickup'=>'Kathmandu','destination'=>'Hetauda']);
        Routes::create(['route_name' => 'Kathmandu-Dharan','pickup'=>'Kathmandu','destination'=>'Dharan']);
    }
}
