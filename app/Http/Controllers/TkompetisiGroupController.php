<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\tkompetisi_group;
use App\Models\vkompetisigroup;

class TkompetisiGroupController extends Controller
{
    public function index(){
        $kompetisi_group = DB::table('tkompetisi_group')->get();
        $vall = DB::table('vkompetisigroup')->get();
        $kompetisi = DB::table('tkompetisi')->get();
        $group = DB::table('tgroup')->get();
        return view('kompetisigroup.index', compact('kompetisi_group','kompetisi','group', 'vall'));
    }
    public function add(){
        tkompetisi_group::create(request()->except(['']));
        return response()->json(true);
    }
    public function data(){
        $columns = [
            'ID',
            'idkompetisi',
            'idkelompok',
            'alias' 
        ];
        $orderBy = $columns[request()->input("order.0.column")];
        $data = vkompetisigroup::select('*');

        if(request('search.value')!='' && request('search.value')!=null){
            $data->where(function($q){
                $q->whereRaw('LOWER(ID) like ?', '%'.strtolower(request('search.value')).'%')
                    ->orWhereRaw('LOWER(alias) like ?', '%'.strtolower(request('search.value')).'%')
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
        $item = tkompetisi_group::findOrFail(request()->input('id'));
        return $item;
    }
    public function delete(){
        tkompetisi_group::where('ID', request()->input('ID'))->delete();
        return response()->json(true);
    }
}