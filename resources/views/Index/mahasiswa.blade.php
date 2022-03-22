@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Data Mahasiswa')

@section('konten')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-striped table-bordered" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">NIM</th>
                            <th class="text-center">NAMA</th>
                            <th class="text-center">NAMA KETUA</th>
                            <th class="text-center">SEMESTER</th>
                            <th class="text-center">PRODI</th>
                            <th class="text-center">NAMA KELOMPOK</th>
                            <th class="text-center">NAMA KEGIATAN</th>
                            <th class="text-center">DOSEN PEMBIMBING</th>
                            <th class="text-center">TINGKAT LOMBA</th>
                            <th class="text-center">PROPOSAL</th>
                            <th class="text-center">STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <th class="text-center">1</th>
                        <th class="text-center">361955401115</th>
                        <th class="text-center">HADI RIZALDI RAHMANTO</th>
                        <th class="text-center">HADI RIZALDI RAHMANTO</th>
                        <th class="text-center">5</th>
                        <th class="text-center">TEKNIK INFORMATIKA</th>
                        <th class="text-center">BUMBLEBEE</th>
                        <th class="text-center">LOMBA PKM</th>
                        <th class="text-center">SOEKARNO </th>
                        <th class="text-center">INTERNATIONAL</th>
                        <th class="text-center">PKM-TI.pdf</th>
                        <th class="text-center"> <div style="	width: 10px;
                            height: 10px;
                            background: green;
                            border-radius: 100%;"></div>Sedang Mengikuti</th>
                    </tbody>
                    <tbody>
                        <th class="text-center">2</th>
                        <th class="text-center">361955401112</th>
                        <th class="text-center">MUHAMMAD ARIF PURNAMA AJI</th>
                        <th class="text-center">MUHAMMAD ARIF PURNAMA AJI</th>
                        <th class="text-center">5</th>
                        <th class="text-center">TEKNIK INFORMATIKA</th>
                        <th class="text-center">BUMBLEBEE</th>
                        <th class="text-center">PKM</th>
                        <th class="text-center">INTERNATIONAL</th>
                        <th class="text-center">PKM-TI.pdf</th>
                        <th class="text-center"> <div style="	width: 10px;
                            height: 10px;
                            background: #dac52c;
                            border-radius: 100%;"></div>Sedang Mengikuti</th>
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