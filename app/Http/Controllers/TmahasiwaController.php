<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tmahasiswa;
use App\Models\vmhs;

class TmahasiwaController extends Controller
{
    //
    public function index(){
        $mahasiswa = DB::table('tmahasiswa')->get();
        $prodi = DB::table('tprodi')->get();
        $mhs = DB::table('vmhs');
        return view('mahasiswa.index', compact('mahasiswa','prodi','mhs'));
    }
    
    public function add(){
        tmahasiswa::create(request()->except(['password']));
        return response()->json(true);
    }

    public function data(){
        $columns = [
            'ID',
            'nim',
            'nama',
            'prodi',
            'status'
        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = vmhs::select('*');

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(nim) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(nama) like ?', '%'.strtolower(request('search.value')).'%')
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
       $item = tmahasiswa::findOrFail(request()->input('id'));
       return $item;
   }

   public function delete(){
       tmahasiswa::where('ID', request()->input('id'))->delete();
       return response()->json(true);
   }
}