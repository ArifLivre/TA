<?php

namespace App\Http\Controllers;

use App\Models\dataProposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class cProposal extends Controller
{
    public function Index(){
       
        $proposal = DB::table('tproposal')->get();
        return view('/Proposal/isi', ['proposal'=>$proposal]);
        
    }

    public function add(){

        return view('/Proposal/add');
    }
    
    public function store(Request $request){
       
        // dd($request);
        $data= new dataProposal();
        $data->nama_proposal=$request->iNama;
        if($request->file('iprosposal')){
            $file = $request->file('iproposal')->storeAs('proposal/', $request->iNama.'.'.$request->file('iproposal')->extension(),'public');
            $data->nama_file = $file;
        }
        $extension = $request->file('iproposal')->extension();
        
        $data->save();
         
       
        
        return redirect()->route('index.proposal');
    }

    public function tampilan(){
        $proposal = DB::table('tproposal')->get();
        return view('/Proposal/tampilan',['proposal'=>$proposal]);
        
        
    }

   
   
   
   
    // $name = $request->file('iproposal')->getClientOriginalName();
    // $request->file('iproposal')->storeAs('proposal/', $name);
   
    // DB::table('tproposal')->insert([
    //     'nama_proposal'=>$request->iproposal->getClientOriginalName(),

    // ]);



}