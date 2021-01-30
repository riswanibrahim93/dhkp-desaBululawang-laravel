<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use Session; 
use App\Imports\DhkpImport;
use Maatwebsite\Excel\Facades\Excel;

class DhkpImportController extends Controller
{
    public function importExcel(Request $request) {
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
		$file = $request->file('file');
		$fileName = rand().$file->getClientOriginalName();
		$file->move('file-excel',$fileName);
		Excel::import(new DhkpImport, public_path('/file-excel/'.$fileName));
		return back();
	}
}
