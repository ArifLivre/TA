<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tlokasi;

class TlokasiController extends Controller
{
    //
    public function index(){
        $mahasiswa = DB::table('tlokasi')->get();
        return view('lokasi.index');
    }
    public function add(){
        tlokasi::create(request()->except(['']));
        return response()->json(true);
    }
    public function data(){
        $columns = [
            'ID',
            'provinsi',

        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = tlokasi::select('*');

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(ID) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(provinsi) like ?', '%'.strtolower(request('search.value')).'%')
                    ;
            });
        }

        $recordFiltered = $data->get()->count();
        $data = $data->orderBy($orderBy, request()->input('order.0.dir'));

        if(request()->input('length')!=-1)
        $data = $data->skip(request()->input('start'))->take(request()->input('length'))->get();

        $recordTotal = $data->count();

        return response()->json([
            'draw'=>request()->input('draw'),
            'recordsTotal'=>$recordTotal,
            'recordsFiltered'=>$recordFiltered,
            'data'=>$data
        ]);
    }
    public function single(){
        $item = tlokasi::findOrFail(request()->input('id'));
        return $item;
    }
    public function delete(){
        tlokasi::where('ID', request()->input('ID'))->delete();
        return response()->json(true);
    }
}