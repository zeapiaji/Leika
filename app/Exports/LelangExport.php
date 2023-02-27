<?php

namespace App\Exports;

use App\Models\Riwayat_Lelang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class LelangExport implements FromView
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $data = Riwayat_Lelang::find($this->id);
        return view('invoices.index', compact('data'));
    }
}
