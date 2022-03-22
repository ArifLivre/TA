<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tkompetisi;
use App\Models\vkompetisi;


class TkompetisiController extends Controller
{
    //
    public function index(){
        $mahasiswa = DB::table('tkompetisi')->get();
        $lokasi = DB::table('tlokasi')->get();
        $all = DB::table('vkompetisi')->get();
        return view('kompetisi.index', compact('mahasiswa','lokasi','all'));
    }
    public function add(){
        tkompetisi::create(request()->except(['']));
        return response()->json(true);
    }
    public function data(){
        $columns = [
            'ID',
            'judul',
            'logo',
            'alamat',
            'lokasi',

        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = vkompetisi::select('*');

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(ID) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(lokasi) like ?', '%'.strtolower(request('search.value')).'%')
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
        $item = tkompetisi::findOrFail(request()->input('id'));
        return $item;
    }
    public function delete(){
        tkompetisi::where('ID', request()->input('id'))->delete();
        return response()->json(true);
    }
}