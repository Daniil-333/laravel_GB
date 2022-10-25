<?php

namespace App\Exports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromArray
{

    public function array(): array
    {
        return News::all()->toArray();
    }
}
