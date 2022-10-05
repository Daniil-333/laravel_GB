<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 1; $i<=10; $i++) {
            $data[] = [

                'title' => $faker->realText(10),
                'description' => $faker->realText(rand(200,700)),
                'isPrivate' => false,
                'image' => null
            ];
        }
        return $data;
    }
}
