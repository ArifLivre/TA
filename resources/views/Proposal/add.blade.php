@extends('layouts/indexmaster')
@section('judul_halaman', 'Isi Form Lomba')

@section('konten')


<div class="col-12">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group">
                <label for="">
                    Nama Proposal
                </label>
                <input class="form-control " type="text" id="Nama" name="iNama" >
                @error('iNama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="iproposal">
                   File
                </label>
                {{-- <div class="img-holder"></div> --}}
                {{-- <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-6"> --}}
                {{-- <input type="file" name="iproposal" placeholder="Masukka Foto Anda..." class="form-control" id="iFoto" onchange="previewImage()" > --}}
                <input class="form-control @error('iproposal') is-invalid @enderror" type="file" id="proposal" name="iproposal" multiple="true">
                @error('iproposal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
    
           
            <button class="btn btn-primary">Submit</button>
        </form>
@endsection

@push('JSLib')
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/modules/sweetalert/sweetalert.min.js') }}"></script>

@endpush

@push('JSFile')
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>    
@endpush

@push('page-styles')
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}"></script>


@endpush
