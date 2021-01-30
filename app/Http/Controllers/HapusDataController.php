<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DHKP;

class HapusDataController extends Controller
{
    public function dhkp(){
    	DHKP::where('id', '!=', '')->delete();
    	DHKP::query()->truncate();
    	return back();
    }
}
