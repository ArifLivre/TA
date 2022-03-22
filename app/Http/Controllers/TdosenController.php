<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tdosen;
use App\Models\vdosen;

class TdosenController extends Controller
{
    //
    public function index(){
        $dosen = DB::table('tdosen')->get();
        $prodi = DB::table('tprodi')->get();
        $all = DB::table('vdosen')->get();
        return view('dosen.index',compact('dosen','prodi','all'));
    }
    public function add(){
        tdosen::create(request()->except(['']));
        return response()->json(true);
    }
    public function data(){
        $columns = [
            'ID',
            'dosen_pembimbing',
            'prodi_dosen',
            'nip_dosen',

        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = vdosen::select('*');

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(ID) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(prodi_dosen) like ?', '%'.strtolower(request('search.value')).'%')
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
        $item = tdosen::findOrFail(request()->input('id'));
        return $item;
    }
    public function delete(){
        tdosen::where('ID', request()->input('ID'))->delete();
        return response()->json(true);
    }
}