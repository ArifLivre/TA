@extends('layouts/indexmaster')
@section('judul_halaman', 'View')

@section('konten')
    <div class="row">
     <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4><a href="{{route('add.proposal')}}" class="btn btn-icon icon-left btn-primary mb-3"> Add Data</a></h4>
                {{-- @if (session()->has('success'))
                    <div class="alert alert-primary">
                        {{ session('succes') }}
                    </div>
                @endif --}}
            </div>
            <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-striped table-bordered" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Nama Proposal</th>
                            <th class="text-center">Preview</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $number = 1;?>
                        @foreach($proposal as $nm)
                        <tr>
                            <td>{{$number}}</td>
                            {{-- <td class="text-center"><a href="{{route('edit.mahasiswa', $nm->NIM)}}">{{$nm->NIM}}</td> --}}
                            <td class="text-center">{{$nm->nama_proposal}}</td>
                            <td class="text-center"><a href="{{ asset ('/storage/proposal/'. $nm->nama_file)}}" target="_blank">{{$nm->nama_file}} </td>
                            <td class="text-center text-nonwrap" style="display: block">
                                {{-- <a href="{{route('edit.mahasiswa', $nm->NIM)}}" class="badge ">EDIT</a> --}}
                                <a href="" class="btn btn-primary btn-action mr-1 "><i class="fas fa-pencil-alt"></i></a>
                                <a href=""  class="btn btn-danger btn-action mr-1 " method="POST" 
                                    onclick="return confirm('Apakah anda yakin akan hapus??');"> 
                                    @csrf
                                    @method('delete')
                                    <i class="fas fa-trash"></i></a> 
                               
                            </td>   
                         </tr>
                
                
                        <?php $number++;?>    
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('JSLib')
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush

@push('JSFile')
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>    
@endpush

@push('page-styles')
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}"></script>

@endpush

@push('page-script')
{{-- <script>
   $(function(){

        //Reset input file
        $('input[type="file"][name="iFoto"]').val('');
        //Image preview
        $('input[type="file"][name="iFoto"]').on('change', function(){
            var pathFoto = $(this)[0].value;
            var img_holder = $('.img-holder');
            var extension = pathFoto.substring(pathFoto.lastIndexOf('.')+1).toLowerCase();

            if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                if(typeof(FileReader) != 'undefined'){
                    img_holder.empty();
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('<img/>',{'src':e.target.result,'class':'img-fluid mb-3 col-sm-6','style':'max-width:300px;max-height:300px;margin-bottom:10px;overflow:hidden;'}).appendTo(img_holder);
                    }
                    img_holder.show();
                    reader.readAsDataURL($(this)[0].files[0]);
                }else{
                    $(img_holder).html('This browser does not support FileReader');
                }
            }else{
                $(img_holder).empty();
            }
        });


})
   
</script> --}}
@endpush