@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Data Mahasiswa')

@section('konten')

<div class="row">
    <div class="col-6">
        <form class="card" id="formA">
            <div class="card-header" id="form-warna" >
            Header
            </div>
            <div class="card-body">
                {{ csrf_field() }}
                <div class="row" >
                    
                    <input type="hidden" name="id" class="form-control">
                    <div class="col-12 " style="margin-bottom: 0.2cm">
                        <label for="">NIM</label>
                        <input type="text" maxlength="12" name="nim" class="form-control">
                    </div>
                    <div class="col-12" style="margin-bottom: 0.2cm">
                        <label for="">NAMA</label>
                        <input type="text" name="nama" class="form-control">
                    </div>
                    <div class="col-12" style="margin-bottom: 0.2cm">
                        <label for="">PRODI</label>
                        <select name="prodi" id="" class="form-control">
                            <option value=""></option>
                            @foreach ($prodi as $item)
                                <option value="{{ $item->ID }}">{{ $item->program_studi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row mb-4" style="margin-top: 20">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                        <div class="col-sm-12 col-md-7">
                            <div id="image-preview" class="image-preview">
                              <label for="image-upload" id="image-label">Choose File</label>
                              <input type="file" name="image" id="image-upload" />
                          </div>
                        </div>
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
    {{-- <div class="col-6">

        <div class="card">
            <div class="card-header">
            Header
            </div>
            <div class="card-body">
            Body
            </div>
            <div class="card-footer">
            Footer
            </div>
        </div>
 
    </div> --}}
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
                            <th>NIM</th>
                            <th>NAMA</th>
                            <th>ProgramStudi</th>
                            <th>Status</th>
                            <th>Password</th>
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
        url:"{{url('data_mahasiswa')}}",
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
                return `<img class="img-fluid" src="{{asset('/storage/image/${row.foto}')}}"width="50"> <span onclick="ambilsatudata(${row.ID})" >${row.nim}</span>`
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.nama
            }
        },
        {
            "class":"",
            "sortable":true,
            "render":function(data,type,row,meta){
                return row.prodi
            }
        },
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
                return row.status
            }
        },
    ]
})


$('#formA').on('submit', function (event){
    event.preventDefault()  //untuk melakukan keep data agar tidak menjadi json masuk ke
    submitform() //mengirimkan data ke database
    
})

function submitform(){
    let form = $('#formA');
    const url = "{{ url('addmahasiswa') }}"; //menggunakan url yang dibuat, data dapat dilihat pada network.

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
    $("#formA [name='nim']").val('')
    $("#formA [name='nama']").val('')
    $("#formA [name='prodi']").val('')
    $("#tombolHapus").removeClass("visible")
    $("#tombolHapus").addClass("invisible")
    $("#activeClass").removeClass("inactive")
    $("#activeClass").addClass("active")

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
            url:`{{ url('deletemahasiswa')}}?id=${id}`,
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

const ambilsatudata = (id)=>(
    $.ajax({
        url:`{{url('detailmahasiswa')}}?id=${id}`,
        success:function(ress){
            $("#formA [name='id']").val(id)
            $("#formA [name='nim']").val(ress.nim)
            $("#formA [name='nama']").val(ress.nama)
            $("#formA [name='prodi']").val(ress.prodi)  
            // $("#form-name").text("update data")
            $("#tombolHapus").removeClass("invisible")
            $("#tombolHapus").addClass("visible")
            $("#activeClass").removeClass("inactive")
            $("#activeClass").addClass("active")
            jQuery("#activeClass").css('background-color','#00ffd9')
            // jQuery("#form-warna").css('background-color','#00ffd9')

    console.log('data yang diambil ID =', id)
    // , 'dan', ress.nama, ress.prodi 
        }
    })
)
</script>

@endpush

