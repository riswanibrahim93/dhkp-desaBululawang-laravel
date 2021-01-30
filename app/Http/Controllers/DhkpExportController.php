<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DhkpExport;

class DhkpExportController extends Controller
{
	public function exportExcel(){		
		return (new DhkpExport)->download('dhkp.xlsx');
	}
}
