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
  $this->call([
       Sickness::class,
       Equipment::class,
       Medical_equipment::class,
       Special_skill::class,
       Aller::class,


   ]);
}
}
