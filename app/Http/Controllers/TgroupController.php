<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tgroup;
use App\Models\vgroupprodi;

class TgroupController extends Controller
{
    //
     //
     public function index(){
        $group = DB::table('tgroup')->get();
        $prodi= DB::table('tprodi')->get();
        $all= DB::table('vgroupprodi')->get();
        return view('group.index',compact('group','all','prodi'));
    }
    public function add(){
        tgroup::create(request()->except(['']));
        return response()->json(true);
    }
    public function data(){
        $columns = [
            'ID',
            'nama_kelompok',
            'logo',
            'status',
            'program_studi',
            'ketua_kelompok',
            'tahun_dibentuk',
            'idproposal',
            'idsertifikat',
            'deskripsi',

        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = vgroupprodi::select('*');
        

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(ID) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(nama_kelompok) like ?', '%'.strtolower(request('search.value')).'%')
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
        $item = tgroup::findOrFail(request()->input('id'));
        return $item;
    }
    public function delete(){
        tgroup::where('ID', request()->input('ID'))->delete();
        return response()->json(true);
    }
}