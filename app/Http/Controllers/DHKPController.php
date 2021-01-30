<?php

namespace App\Http\Controllers;

use App\DHKP;
use Illuminate\Http\Request;
use DataTables;

class DHKPController extends Controller{

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(Request $request){  
		if ($request->ajax()) {
			$data = DHKP::get();
			return Datatables::of($data)
			->addIndexColumn()
            ->editColumn('pbb', function ($data) {
                return number_format($data->pbb, 0);
            })
			->addColumn('action', function($row){

				$btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editDHKP">Edit</a>';

				$btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteDHKP">Hapus</a>';

				return $btn;
			})
            ->addColumn('lokasi', function($row){

                $lokasi = '<a class="custom-link" href="https://www.google.com/maps/place/'.$row->lat.',+'.$row->longi.'/@'.$row->lat.','.$row->longi.',19z" target="_blank">Lihat</a>';

                return $lokasi;
            })
            ->rawColumns(['action', 'lokasi'])
            ->make(true);
        }

        return view('dhkp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
    	DHKP::updateOrCreate(
    		['id' => $request->dhkp_id],
    		[
    			'nop' => $request->nop,
    			'alamat' => $request->alamat,
    			'rt_rw' => $request->rt_rw,
    			'luas_tanah' => $request->luas_tanah,
    			'luas_bangunan' => $request->luas_bangunan,
    			'persil' => $request->persil,
    			'c' => $request->c,
    			'nama_wp' => $request->nama_wp,
                'nama_kepemilikan' => $request->nama_kepemilikan,
    			'alamat_wp' => $request->alamat_wp,
    			'rt_rw_wp' => $request->rt_rw_wp,
    			'kelurahan' => $request->kelurahan,
    			'kota' => $request->kota,
    			'pbb' => $request->pbb,
                'lat' => $request->latt,
                'longi' => $request->longt
            ]
        );        

    	return response()->json(['success'=>'DHKP Disimpan.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DHKP  $DHKP
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
    	$DHKP = DHKP::find($id);
    	return response()->json($DHKP);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DHKP  $DHKP
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
    	DHKP::find($id)->delete();

    	return response()->json(['success'=>'DHKP Dihapus.']);
    }
}
