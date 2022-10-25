<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resource = [
            [
                "title" => "Лента ру",
                "url" => "https://lenta.ru/rss"
            ],
            [
                "title" => "Газета ру",
                "url" => "https://www.gazeta.ru/export/rss/first.xml"
            ],
        ];

        DB::table('resources')->insert($resource);
    }
}
