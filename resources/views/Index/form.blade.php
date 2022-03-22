@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Form Mengikuti Lomba')

@section('konten')

<div class="row">
    <div class="col-6">
    
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">
                    NIM
                </label>
                <input type="text" name="iNIM" placeholder="Masukkan nim Anda..." class="form-control" >
            </div>
            <div class="form-group">
                <label for="">
                    NAMA
                </label>
                <input type="text" name="iNIM" placeholder="Masukkan nama Anda..." class="form-control" >
            </div>
            <div class="form-group">
                <label for="">
                    NAMA KETUA
                </label>
                <input type="text" name="iNIM" placeholder="Masukkan nama ketua Anda..." class="form-control" >
            </div>
            <div class="form-group">
                <label for="">
                    WAKTU PELAKSANAAN
                </label>
                <input type="text" name="iNIM" placeholder="Masukkan waktu pelaksanaan Anda..." class="form-control" >
            </div>
            <div class="form-group">
                <label>Pendanaan</label>
                <select class="form-control">
                  <option>Pribadi</option>
                  <option>Kampus</option>
                  <option>Risedikti</option>
                </select>
              </div>
            
        </form>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">
                    NAMA KELOMPOK
                </label>
                <input type="text" name="iNIM" placeholder="Masukkan nama kelompok Anda..." class="form-control" >
            </div>
            <div class="form-group">
                <label for="">
                    NAMA KEGIATAN
                </label>
                <input type="text" name="iNIM" placeholder="Masukkan nama kegiatan Anda..." class="form-control" >
            </div>
            <div class="form-group">
                <label for="">
                   DOSEN PEMBIMBING
                </label>
                <input type="text" name="iNIM" placeholder="Masukkan nama kegiatan Anda..." class="form-control" >
            </div>
            <div class="form-group">
                <label for="">
                    TINGKAT LOMBA
                </label>
                <input type="text" name="iNIM" placeholder="Masukkan tingkat lomba Anda..." class="form-control" >
            </div>
            <div class="form-group">
                <label for="">
                    UPLOAD PROPOSAL ANDA
                </label>
                <input type="file" name="iNIM" placeholder="Masukkan upload proposal ANDA Anda..." class="form-control" >
            </div>
        
        </div>
        <button class="btn btn-primary">Submit</button>
        
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