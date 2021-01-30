<?php

namespace App\Exports;

use App\DHKP;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class DhkpExport implements FromView, ShouldAutoSize, WithColumnFormatting
{
	use Exportable;

	public function columnFormats(): array
    {
        return [
        	'O' => NumberFormat::FORMAT_TEXT,
    		'P' => NumberFormat::FORMAT_TEXT
        ];
    }

	public function view(): View
	{
    	return view('exports.data_dhkp', [        	
    		'data_dhkp' => DHKP::all()
    	]);
    }
}

