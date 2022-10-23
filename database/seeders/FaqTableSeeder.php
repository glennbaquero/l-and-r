<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Faq;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::factory()->count(10)->create();
    }
}
