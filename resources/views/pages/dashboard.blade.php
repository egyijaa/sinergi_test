@extends('layouts.main')

@section('container')
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, Selamat Datang!</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Transaksi</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex d-inline">
                        <h4 class="card-title">Daftar Transanksi</h4>
                        <a href="{{ route('transaksi.formInput') }}"><i class="btn btn-sm btn-primary shadow-sm">+ Transanksi Baru</i></a>
                      </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display dataTable table-striped table-bordered table-hover table-responsive-sm" style="font-size: 11px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No Transanksi</th>
                                        <th>Tanggal</th>
                                        <th>Nama Customer</th>
                                        <th>Jumlah Barang</th>
                                        <th>Sub Total</th>
                                        <th>Diskon</th>
                                        <th>Ongkir</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($t_sales as $item)
                                    <tr class="selected">
                                        <td>{{ $i }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ date('d-M-Y', strtotime($item->tgl)) }}</td>
                                        <td>{{ $item->m_customer->nama }}</td>
                                        <td>{{ $item->jumlah_barang }}</td>
                                        <td>@currency($item->subtotal)</td>
                                        <td>@currency($item->diskon)</td>
                                        <td>@currency($item->ongkir)</td>
                                        <td>@currency($item->total_bayar)</td>
                                    </tr>
                                    @php
                                        $i++
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
@endsection