<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportBarang implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Barang::orderBy('id', 'desc')->get();
        $no = 1;

        return view('exports.barang', compact('data', 'no'));
    }
}
