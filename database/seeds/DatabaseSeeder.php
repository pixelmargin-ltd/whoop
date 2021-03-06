<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(HomeButtonTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubcategoriesTableSeeder::class);
        $this->call(DealsUnlockedTableSeeder::class);
        $this->call(ProviderTableSeeder::class);
        $this->call(BoostCodeProviderTableSeeder::class);
        $this->call(UserUsedDealTableSeeder::class);
    }
}
