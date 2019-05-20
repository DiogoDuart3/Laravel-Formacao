<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //factory(App\Pen::class, 10)->create();
        //factory(App\Post::class, 10)->create();
        //factory(App\User::class, 10)->create();

        $this->call(UsersTableSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(PhotosSeeder::class);
        //$this->call(PostsTableSeeder::class);
        //$this->call(PensTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
