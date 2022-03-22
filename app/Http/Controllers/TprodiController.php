<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tprodi;

class TprodiController extends Controller
{
    //
    public function index(){
        $mahasiswa = DB::table('tprodi')->get();
        return view('prodi.index');
    }
    public function add(){
        tprodi::create(request()->except(['']));
        return response()->json(true);
    }
    public function data(){
        $columns = [
            'ID',
            'program_studi',

        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = tprodi::select('*');

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(ID) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(program_studi) like ?', '%'.strtolower(request('search.value')).'%')
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
        $item = tprodi::findOrFail(request()->input('id'));
        return $item;
    }
    public function delete(){
        tprodi::where('ID', request()->input('id'))->delete();
        return response()->json(true);
    }
}