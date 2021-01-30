<?php

namespace App\Imports;

use App\DHKP;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class DhkpImport implements ToModel, WithStartRow
{
	/**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
    	return new DHKP([
    		'nop' => $row[1],
    		'alamat' => $row[2],
    		'rt_rw' => $row[3],
    		'luas_tanah' => $row[4],
    		'luas_bangunan' => $row[5],
    		'persil' => $row[6],
    		'c' => $row[7],    	            
            'nama_wp' => $row[8],
            'nama_kepemilikan' => $row[9],              
    		'alamat_wp' => $row[10],
    		'rt_rw_wp' => $row[11],
    		'kelurahan' => $row[12],
    		'kota' => $row[13],
    		'pbb' => $row[14],
            'lat' => $row[15],
            'longi' => $row[16],
    	]);
    }
}
