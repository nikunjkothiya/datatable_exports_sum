<?php

use Illuminate\Database\Seeder;

use App\Models\NatureBusiness;
class NatureBusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NatureBusiness::factory()
            ->times(5)
            ->create();
    }
}
