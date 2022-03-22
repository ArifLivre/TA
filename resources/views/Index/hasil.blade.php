@extends('layouts.indexmaster') 
{{-- untuk memanggil sebuah extend dari file lain dapat menggunakan '/' atau '.' --}}
@section('judul_halaman', 'Daftar')

@section('konten')


<div class="section-body">
    <div class="invoice">
      <div class="invoice-print">
        <div class="row">
          <div class="col-lg-12">
            <div class="invoice-title">
              
              
            </div>
            <hr>
            <div class="row">
              <div class="col-md-3">
                <address>
                  <strong>KELOMPOK</strong><br>
                    NIM<br>
                    Nama<br>
                    Nama Ketua<br>
                    Waktu Pelaksanaan <br>
                    Pendanaan <br>
                    Nama Kelompok <br>
                    Nama Kegiatan <br>
                    Dosen Pembimbing <br>
                    Tingkat Lomba <br>
                    Nama Proposal <br>
                </address>
              </div>
              <div class="col-md-1 ">
                <address>
                  <strong>:</strong><br>
                  : <br>
                  : <br>
                  : <br>
                  : <br>
                  : <br>
                  : <br>
                  : <br>
                  : <br>
                  : <br>
                  : <br>
                </address>
              </div>
              <div class="col-md-6  " >
                <address>
                  <strong></strong><br>
                  361955401112<br>
                  Muhammad Arif Purnama Aji<br>
                  Muhammad Arif Purnama Aji<br>
                  26 Januari 2022 <br>
                  Pribadi <br>
                  Bumblebee <br>
                  PKM-TI <br>
                  Soekarno<br>
                  Nasional <br>
                  PKM-TI.pdf <br>
                </address>
              </div>
            </div>
            <div class="row">
              {{-- <div class="col-md-6">
                <address>
                  <strong>Payment Method:</strong><br>
                  Visa ending **** 4242<br>
                  ujang@maman.com
                </address>
              </div>
              <div class="col-md-6 text-md-right">
                <address>
                  <strong>Order Date:</strong><br>
                  September 19, 2018<br><br>
                </address>
              </div> --}}
            </div>
          </div>
        </div>

        {{-- <div class="row mt-4">
          <div class="col-md-12">
            <div class="section-title">Order Summary</div>
            <p class="section-lead">All items here cannot be deleted.</p>
            <div class="table-responsive">
              <table class="table table-striped table-hover table-md">
                <tr>
                  <th data-width="40">#</th>
                  <th>Item</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-right">Totals</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mouse Wireless</td>
                  <td class="text-center">$10.99</td>
                  <td class="text-center">1</td>
                  <td class="text-right">$10.99</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Keyboard Wireless</td>
                  <td class="text-center">$20.00</td>
                  <td class="text-center">3</td>
                  <td class="text-right">$60.00</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Headphone Blitz TDR-3000</td>
                  <td class="text-center">$600.00</td>
                  <td class="text-center">1</td>
                  <td class="text-right">$600.00</td>
                </tr>
              </table>
            </div>
            <div class="row mt-4">
              <div class="col-lg-8">
                <div class="section-title">Payment Method</div>
                <p class="section-lead">The payment method that we provide is to make it easier for you to pay invoices.</p>
                <div class="d-flex">
                  <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                  <div class="mr-2 bg-jcb" data-width="61" data-height="38"></div>
                  <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                  <div class="bg-paypal" data-width="61" data-height="38"></div>
                </div>
              </div>
              <div class="col-lg-4 text-right">
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Subtotal</div>
                  <div class="invoice-detail-value">$670.99</div>
                </div>
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Shipping</div>
                  <div class="invoice-detail-value">$15</div>
                </div>
                <hr class="mt-2 mb-2">
                <div class="invoice-detail-item">
                  <div class="invoice-detail-name">Total</div>
                  <div class="invoice-detail-value invoice-detail-value-lg">$685.99</div>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      <hr>
      <div class="text-md-right">
        <div class="float-lg-left mb-lg-0 mb-3">
          <button  class="btn btn-primary btn-icon icon-left"><i class="fas fa-check-square"></i> Setuju</button>
        </div>
        {{-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button> --}}
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