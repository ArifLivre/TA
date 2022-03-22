@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Form Mengikuti Lomba')

@section('konten')

        <div class="col-8">
           
           
            <div class="form-group">
                <label for="">
                    PRESTASI 
                </label>
                <input type="text" name="iNIM" placeholder="Masukkan  PRESTASI  Anda..." class="form-control" >
            </div>
            <div class="form-group">
                <label for="">
                    UPLOAD SERTIFIKAT ANDA
                </label>
                <input type="file" name="iNIM" placeholder="Masukkan  UPLOAD PROPOSAL ANDA Anda..." class="form-control" >
            </div>
        
        </div>
        <button class="btn btn-primary">Submit</button>
        



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