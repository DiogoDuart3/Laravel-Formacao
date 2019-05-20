<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pen::class, 10)->create();
    }
}
