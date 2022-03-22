@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Dashboard')

@section('konten')

<div class="row ml-5">
    <div class="card mt-5 mr-5" style="width: 18rem; background-color:yellow">
        <div class="card-body">
          <h6 class="card-text">Mahasiswa sedang mengikuti Lomba :</h6>
          <br>
          <h3 class="card-text">90</h3>
        </div>
    </div>
    <div class="card mt-5 mr-5" style="width: 18rem; background-color:#75f542">
        <div class="card-body">
            <h6 class="card-text">Mahasiswa Menjuarai Lomba:</h6>
            <br>
            <h3 class="card-text"></h3>
        </div>
    </div>
    <div class="card mt-5" style="width: 18rem; background-color:aqua">
        <div class="card-body">
            <h6 class="card-text">Mahasiswa Tidak Menjuarai</h6>
            <br>
            <h3 class="card-text">90</h3>
        </div>
    </div>
      
</div>

<div class="d-flex justify-content-center">
    <img src="/assets/img/diagram.png" alt="" style="height: 15rem;margin-left=30px" >
 
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
<script type="text/javascript" rel="stylesheet" src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" rel="stylesheet" src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
<script type="text/javascript" rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}"></script>


@endpush