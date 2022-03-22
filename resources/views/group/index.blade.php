@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Data Group')

@section('konten')

<div class="row">
    <div class="col-5">
        <form class="card" id="formA">
            <div class="card-header" id="form-warna" >
            Header
            </div>
            <div class="card-body">
                {{ csrf_field() }}
                <div class="row" >
                    <input type="hidden" name="id" class="form-control">
                    <div class="col-12 " style="margin-bottom: 0.2cm">
                        <label for="">Nama Kelompok</label>
                        <input type="text" name="nama_kelompok" class="form-control">
                    </div>
                    {{-- <div class="col-12" style="margin-bottom: 0.2cm">
                        <label for="">Logo Kelompok</label>
                        <input type="text" name="logo" class="form-control">
                    </div> --}}
                    <div class="col-12" style="margin-bottom: 0.2cm">
                        <label for="">Status</label>
                        <input type="text" name="status" class="form-control">
                    </div>
                    <div class="col-12" style="margin-bottom: 0.2cm">
                        <label for="">Program Studi</label>
                        <select name="prodi" id="" class="form-control">
                            <option value=""></option>
                            @foreach ($prodi as $item)
                                <option value="{{ $item->ID }}">{{ $item->program_studi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12" style="margin-bottom: 0.2cm">
                        <label for="">Tahun Dibentuk</label>
                        <input type="text" name="tahun_dibentuk" class="form-control">
                    </div>
                    <div class="col-12" style="margin-bottom: 0.2cm">
                        <label for="">Proposal</label>
                        <input type="text" name="idproposal" class="form-control">
                    </div>
                    <div class="col-12" style="margin-bottom: 0.2cm">
                        <label for="">Sertifikat</label>
                        <input type="text" name="idsertifikat" class="form-control">
                    </div>
                    <div class="col-12" style="margin-bottom: 0.2cm">
                        <label for="">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control">
                    </div>
                </div>
            </div>
            <div class="card-footer" style="text-align: right; margin-right:2%">
                <button type="button" class="btn btn-danger invisible" onclick="hapusData()" id="tombolHapus">Hapus</button>
                <button type="button" class="btn btn-secondary " onclick="clearform()" id="tombolClear">Clear</button>
                <button type="submit" class="btn btn-primary">Save</button>
        
            </div>
        </form>
 
    </div>

</div>

<div class="row">
    <div class="col-12" >
        <div class="card">
            <div class="card-header">
            Header
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table_list">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Kelompok</th>
                            {{-- <th>Logo</th> --}}
                            <th>Status</th>
                            <th>Program Studi</th>
                            <th>Ketua Kelompok</th>
                            <th>Tahun Dibentuk</th>
                            <th>Proposal</th>
                            <th>Sertifikat</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="card-footer">
            Footer
            </div>
        </div>
    </div>
</div>





@endsection

@push('JSLib')
<script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
{{-- <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script> --}}
@endpush

@push('JSFile')
{{-- <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>     --}}
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
@endpush

@push('page-styles')
{{-- <script rel="stylesheet" src="{{ asset('assets/modules/datatables/datatables.min.css') }}"></script> --}}
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
<script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}"></script>

@endpush

@push('page-script')
<script type="application/javascript">
let data=[]

const table= $("#table_list").DataTable({
    "responsive":true,
    "autowidth":false,
    "pageLength":5,
    "lengthMenu":[[3,5,10,15,20,1000],[3,5,10,15,20,"ALL"]],
    "order":[[0,"asc"]],
    "bServerSide":true,
    "bLengthChange":true,
    "bFilter":true,
    "bInfo":true,
    "processing":true,

    "ajax":{
        url:"{{url('data_group')}}",
        type:"post",
        data:function(d){
            d._token = "{{ csrf_token()}}"
            d.areaaa = $("#area_filter").val()
        }
    },
    columns:[
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return `<span onclick="ambilsatudata(${row.ID})">${row.ID}</span>`
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return  `<img class="img-fluid" src="{{asset('/storage/image/${row.logo}')}}" width="25"> <span onclick="ambilsatudata(${row.ID})">${row.nama_kelompok}</span>`
            }
        },
        // {
        //     "class":"",
        //     "sortable":true,
        //     "render":function(data,type,row,meta){
        //         return row.logo
        //     }
        // },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.status
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.program_studi
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.ketua_kelompok
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.tahun_dibentuk
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.idproposal
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.idsertifikat
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.deskripsi
            }
        },
    ]
})

const ambilsatudata = (id)=>(
    $.ajax({
        url:`{{url('detailgroup')}}?id=${id}`,
        success:function(ress){
            $("#formA [name='id']").val(id)
            $("#formA [name='nama_kelompok']").val(ress.nama_kelompok)
            $("#formA [name='logo']").val(ress.logo)
            $("#formA [name='status']").val(ress.status)
            $("#formA [name='prodi']").val(ress.prodi)
            $("#formA [name='ketua_kelompok']").val(ress.ketua_kelompok)
            $("#formA [name='tahun_dibentuk']").val(ress.tahun_dibentuk)
            $("#formA [name='idproposal']").val(ress.idproposal)
            $("#formA [name='idsertifikat']").val(ress.idsertifikat)
            $("#formA [name='deskripsi']").val(ress.deskripsi)
            $("#tombolHapus").removeClass("invisible")
            $("#tombolHapus").addClass("visible")

    console.log('data yang diambil ID =', id)
    // , 'dan', ress.nama, ress.prodi 
        }
    })
)

$('#formA').on('submit', function (event){
    event.preventDefault()  //untuk melakukan keep data agar tidak menjadi json masuk ke
    submitform() //mengirimkan data ke database
    
})

function submitform(){
    let form = $('#formA');
    const url = "{{ url('addgroup') }}"; //menggunakan url yang dibuat, data dapat dilihat pada network.

    $.ajax({
        url,
        method: "POST",
        data:form.serialize(),

        success:function(response){
            console.log(response)
            clearform() //untuk hapus isi data
            refreshTable() //untuk merefresh halaman
        },
        error:function(ee){
            console.log(ee)
            alert("Kesalahan Input") //warning jika ada kesalahan
        }
    })
}


function clearform(){
    $("#formA [name='id']").val('')
    $("#formA [name='nama_kelompok']").val('')
    $("#formA [name='logo']").val('')
    $("#formA [name='status']").val('')
    $("#formA [name='prodi']").val('')
    $("#formA [name='ketua_kelompok']").val('')
    $("#formA [name='tahun_dibentuk']").val('')
    $("#formA [name='idproposal']").val('')
    $("#formA [name='idsertifikat']").val('')
    $("#formA [name='deskripsi']").val('')
    $("#tombolHapus").removeClass("visible")
    $("#tombolHapus").addClass("invisible")
}

function refreshTable(){
    table.ajax.reload(function(){
    },true);
}

function hapusData(){
    const id = $("#formA [name='id']").val()
    const c = confirm("Yakin Mengahpus Data?")
    if(c===true){
        $.ajax({
            url:`{{ url('deletedosen')}}?id=${id}`,
            success:function(res){
                console.log('Data yang dihapus',id) 
                clearform()
                refreshTable()
                alert('Hapus')
               
            },
            error:(err)=>{
                alert("Terjadi Kesalahan")
            }
            
        })
       
    }
    console.log('Ini Hapus Data');
}



</script>

@endpush

