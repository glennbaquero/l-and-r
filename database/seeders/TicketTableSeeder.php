<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Ticket;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	Ticket::factory()->count(50)->create();
    }
}
