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
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Datatable</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <p><strong>Opps Something went wrong</strong></p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-validation">
                                            <form class="form-valide" action="#" method="post">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div id="accordion-seven"
                                                            class="accordion accordion-header-bg accordion-bordered">
                                                            <div class="accordion__item">
                                                                <div class="accordion__header accordion__header--primary"
                                                                    data-toggle="collapse"
                                                                    data-target="#header-bg_collapseTwo">
                                                                    <span class="accordion__header--icon"></span>
                                                                    <span
                                                                        class="accordion__header--text">Transaksi</span>
                                                                    <span class="accordion__header--indicator"></span>
                                                                </div>
                                                                <div id="header-bg_collapseTwo"
                                                                    class="collapse accordion__body show"
                                                                    data-parent="#accordion-seven">
                                                                    <div class="accordion__body--text">
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-3 col-form-label"
                                                                                for="val-kode">Nomor
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <div class="col-lg-9">
                                                                                <input
                                                                                    data-id="{{ $last_row->id ?? 0 }}"
                                                                                    readonly type="text"
                                                                                    class="form-control" id="val-nomor"
                                                                                    name="val-nomor"
                                                                                    placeholder="Choose Date please..">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-3 col-form-label"
                                                                                for="val-tgl">Tanggal
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <div class="col-lg-9">
                                                                                <input type="date" class="form-control"
                                                                                    id="val-tgl" name="val-tgl"
                                                                                    placeholder="Choose Kode please..">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div id="accordion-seven"
                                                            class="accordion accordion-header-bg accordion-bordered">
                                                            <div class="accordion__item">
                                                                <div class="accordion__header accordion__header--primary"
                                                                    data-toggle="collapse"
                                                                    data-target="#header-bg_collapseOne">
                                                                    <span class="accordion__header--icon"></span>
                                                                    <span
                                                                        class="accordion__header--text">Customer</span>
                                                                    <span class="accordion__header--indicator"></span>
                                                                </div>
                                                                <div id="header-bg_collapseOne"
                                                                    class="collapse accordion__body show"
                                                                    data-parent="#accordion-seven">
                                                                    <div class="accordion__body--text">
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-3 col-form-label"
                                                                                for="val-kode">Kode
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <div class="col-lg-4">
                                                                                <input type="text"
                                                                                    class="btn btn-outline-dark disabled muncul col-10"
                                                                                    id="tampilKode" hidden
                                                                                    style="font-size: 12px" disabled>
                                                                                <a href="#"
                                                                                    class="btn btn-outline-dark disabled hilang"
                                                                                    style="font-size: 12px">Click Blue
                                                                                    Button</a>
                                                                            </div>
                                                                            <label class="col-lg-5"
                                                                                for="val-skill"><button type="button"
                                                                                    class="btn btn-primary disabled"
                                                                                    data-toggle="modal"
                                                                                    data-target="#basicModal"
                                                                                    id="pilihKode">Pilih Kode
                                                                                    Customer</button>
                                                                            </label>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="btn btn-outline-info disabled col-12"
                                                                            id="tampilId" hidden>
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-3 col-form-label"
                                                                                for="val-nama">Nama
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <div class="col-lg-9">
                                                                                <input type="text"
                                                                                    class="btn btn-outline-dark disabled muncul col-12"
                                                                                    id="tampilNama" hidden disabled>
                                                                                <a href="#"
                                                                                    class="btn btn-outline-dark disabled hilang">Name
                                                                                    will display here after you choose
                                                                                    the customer kode first</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label class="col-lg-3 col-form-label"
                                                                                for="val-telepon">Telepon
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <div class="col-lg-9">
                                                                                <input type="text"
                                                                                    class="btn btn-outline-dark disabled muncul col-12"
                                                                                    id="tampilTelp" hidden disabled>
                                                                                <a href="#"
                                                                                    class="btn btn-outline-dark disabled hilang">Telepon
                                                                                    will display here after you choose
                                                                                    the customer kode first</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table
                                    class="table table-bordered table-striped verticle-middle table-responsive-sm text-dark"
                                    id="tbl_posts">
                                    <thead>
                                        <tr align="center">
                                            <th colspan="2" rowspan="2"><button type="button"
                                                    class="btn btn-primary disabled" style="font-size: 10px"
                                                    id="newData" data-toggle="modal"
                                                    data-target="#tambahData">Tambah</button>
                                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                                    aria-hidden="true" id="tambahData">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modal title</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span>&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="card">
                                                                            <div class="card-header">
                                                                                <h4 class="card-title">Pilih Barang</h4>
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="form-validation">
                                                                                    <form class="form-valide-transaksi"
                                                                                        action="#"
                                                                                        method="post"
                                                                                        enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <div class="row">
                                                                                            <div class="col-xl-12">
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="col-lg-4 col-form-label"
                                                                                                        for="cust_kode">Kode
                                                                                                        Customer
                                                                                                    </label>
                                                                                                    <div
                                                                                                        class="col-lg-6">
                                                                                                        <input
                                                                                                            type="hidden"
                                                                                                            class="cust_id form-control bg-grey bg-secondary text-white"
                                                                                                            name="cust_id"
                                                                                                            disabled>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="cust_kode form-control bg-grey bg-secondary text-white"
                                                                                                            name="cust_kode"
                                                                                                            disabled>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="col-lg-4 col-form-label"
                                                                                                        for="kode">Nomor
                                                                                                        Transaksi
                                                                                                    </label>
                                                                                                    <div
                                                                                                        class="col-lg-6">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="kode form-control bg-secondary text-white"
                                                                                                            name="kode"
                                                                                                            disabled>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="col-lg-4 col-form-label"
                                                                                                        for="val-skill">Pilih
                                                                                                        Barang
                                                                                                        <span
                                                                                                            class="text-danger">*</span>
                                                                                                    </label>
                                                                                                    <div
                                                                                                        class="col-lg-6">
                                                                                                        <select
                                                                                                            class="barang form-control"
                                                                                                            id="val-skill"
                                                                                                            name="val-skill">
                                                                                                            <option
                                                                                                                value=""
                                                                                                                selected
                                                                                                                disabled>
                                                                                                                Please
                                                                                                                select
                                                                                                            </option>
                                                                                                            @foreach($m_barang as $item)
                                                                                                            <option
                                                                                                                value="{{ $item->id }}"
                                                                                                                data-kode="{{ $item->kode }}"
                                                                                                                data-harga="{{ $item->harga }}"
                                                                                                                data-nama="{{ $item->nama }}"
                                                                                                                data-kuantiti="{{ $item->kuantiti }}">
                                                                                                                {{ $item->nama }}
                                                                                                            </option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="col-lg-4 col-form-label"
                                                                                                        for="qty">Quantity
                                                                                                        <span
                                                                                                            class="text-danger">*</span>
                                                                                                    </label>
                                                                                                    <div
                                                                                                        class="col-lg-5">
                                                                                                        <input
                                                                                                            type="number"
                                                                                                            class="qty form-control disabled"
                                                                                                            id="qty"
                                                                                                            name="qty"
                                                                                                            placeholder=""
                                                                                                            readonly>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="col-lg-3">
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="kuota form-control disabled"
                                                                                                            id="kuota"
                                                                                                            name="kuota"
                                                                                                            placeholder=""
                                                                                                            disabled>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <label
                                                                                                        class="col-lg-4 col-form-label"
                                                                                                        for="diskonKecil">Diskon
                                                                                                        <span
                                                                                                            class="text-danger">*</span>
                                                                                                    </label>
                                                                                                    <div
                                                                                                        class="col-lg-6">
                                                                                                        <input
                                                                                                            type="number"
                                                                                                            class="diskonKecil form-control  disabled"
                                                                                                            readonly
                                                                                                            id="diskonKecil"
                                                                                                            name="diskonKecil"
                                                                                                            placeholder="">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div
                                                                                                    class="form-group row">
                                                                                                    <div
                                                                                                        class="col-lg-8 ml-auto">
                                                                                                        <button
                                                                                                            type="button"
                                                                                                            class="pesan btn btn-primary">Submit</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </th>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Kode Barang</th>
                                            <th rowspan="2">Nama Barang</th>
                                            <th rowspan="2">Qty</th>
                                            <th rowspan="2">Harga Bandrol</th>
                                            <th colspan="2" style="width: 15%">Diskon</th>
                                            <th rowspan="2">Harga Diskon</th>
                                            <th rowspan="2">Total</th>
                                        </tr>
                                        <tr>
                                            <th>(%)</th>
                                            <th>(Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbl_posts_body">
                                    </tbody>
                                </table>
                                <div style="display:none;">
                                    <table id="sample_table" class="table-responsive-sm">
                                        <tr id="" style="font-size: 11px">
                                            <td><button type="button" class="btn btn-info ubahTombol controller" name="ubahTombol"
                                                    style="font-size: 10px" data-toggle="modal"
                                                    data-target="#ubahData">Ubah</button></td>
                                            <td><a class="btn btn-danger delete-record" data-id="0"
                                                    style="font-size: 10px" data-toggle="modal"
                                                    data-target="#basicModalHapus">Hapus</a></td>
                                            <td><span class="sn"></span></td>
                                            <td style="width: 2%" name="kodeBTabel" class="kodeBTabel"
                                                data-kodeBTabel=""></td>
                                            <td style="width: 14%" name="namaBTabel" class="namaBTabel"
                                                data-namaBTabel=""></td>
                                            <td style="width: 6%" name="totalQty" class="totalQty" data-totalQty="">
                                            </td>
                                            <td style="width: 13%" name="hargaBAwal" class="hargaBAwal"
                                                data-hargaBAwal=""></td>
                                            <td style="width: 5%" name="diskonBInput" class="diskonBInput" align="right"
                                                data-diskonBInput=""></td>
                                            <td style="width: 11%" name="diskonBRp" class="diskonBRp" data-diskonBRp="">
                                            </td>
                                            <td style="width: 13%" name="hargaDiskon" class="hargaDiskon"
                                                data-hargaDiskon=""></td>
                                            <td style="width: 14%" name="totalSem" class="totalSem" data-totalSem="">
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                                <table id="sample_table2" class="table verticle-middle table-responsive-sm text-dark">
                                    <tr id="" style="font-size: 11px">
                                        <td></td>
                                        <td></td>
                                        <td><span class="sn"></span></td>
                                        <td style="width: 3%" name="kodeBTabel" class="kodeBTabel" data-kodeBTabel="">
                                        </td>
                                        <td style="width: 14%" name="namaBTabel" class="namaBTabel" data-namaBTabel="">
                                        </td>
                                        <td style="width: 5%" name="totalQty" class="totalQty" data-totalQty=""></td>
                                        <td style="width: 13%" name="hargaBAwal" class="hargaBAwal" data-hargaBAwal="">
                                        </td>
                                        <td style="width: 5%" name="diskonBInput" class="diskonBInput" align="right"
                                            data-diskonBInput=""></td>
                                        <td style="width: 11%" name="diskonBRp" class="diskonBRp" data-diskonBRp="">
                                        </td>
                                        <td style="width: 13%" name="hargaDiskon" class="hargaDiskon"
                                            data-hargaDiskon=""></td>
                                        <td style="width: 14%" name="totalSem" class="totalSem" data-totalSem=""></td>
                                    </tr>
                                    <tr class=" table-borderless" style="background-color: white;">
                                        <td colspan="7"></td>
                                        <th colspan="2">Sub Total</th>
                                        <th colspan="2" id="subTotal" data-subTotal="" nama="subTotal" class="subTotal">
                                        </th>
                                    </tr>
                                    <tr class=" table-borderless" style="background-color: white;">
                                        <td colspan="7"></td>
                                        <th colspan="2">Diskon</th>
                                        <th colspan="2">
                                            <div class="input-group mb-2">
                                                <input style="text-align: right" id="diskonBesar" type="number"
                                                    name="diskonBesar" class="form-control diskonBesar" value="">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> % </span>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr class=" table-borderless" style="background-color: white;">
                                        <td colspan="7"></td>
                                        <th colspan="2">Ongkir</th>
                                        <th colspan="2">
                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">Rp.</div>
                                                </div>
                                                <input type="number" class="form-control ongkir" value="" name="ongkir"
                                                    id="ongkir">
                                            </div>
                                        </th>
                                    </tr>
                                    <tr class=" table-borderless" style="background-color: white;">
                                        <td colspan="7"></td>
                                        <th colspan="2">Total Bayar</th>
                                        <th colspan="2" data-total="" class="total" name="total" id="total"
                                            style="font-size: 130%"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="11" align="center"><button class="btn btn-success disabled simpan"
                                                id="simpan" name="simpan">Simpan</button>
                                                <button class="btn btn-warning batal"
                                                id="batal" name="batal">Batal</button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="basicModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><label class="col-lg-12 col-form-label" for="val-skill">Pilih
                                    Customer (Silahkan Pilih Salah Satu)
                                    <span class="text-danger">*</span>
                                </label></h4>
                        </div>
                        <div class="card-body">
                            <div class="form-validation">
                                <form class="form-valide" action="#" method="post">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                @foreach ($m_customer as $item)
                                                <div class="col-lg-4 mb-3">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <input type="radio" name="gridRadios"
                                                                    class="radioButton customer" required
                                                                    data-id="{{ $item->id }}"
                                                                    data-nama="{{ $item->nama }}"
                                                                    data-kode="{{ $item->kode }}"
                                                                    data-telp="{{ $item->telp }}">
                                                            </div>
                                                        </div>
                                                        <input style="font-size: 10.5px" type="text"
                                                            class="form-control"
                                                            value="{{ $item->kode }}|{{ $item->nama }}" disabled>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('customer.index') }}" style="font-size: 9px">Customer Tidak Terdaftar?</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary pilihIni disabled">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="ubahData">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Pesanan Barang</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide-transaksi" action="#" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="cust_kode">Kode Customer
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="hidden"
                                                            class="cust_idUbah form-control bg-grey bg-secondary text-white"
                                                            name="cust_idUbah" disabled>
                                                        <input type="text"
                                                            class="cust_kodeUbah form-control bg-grey bg-secondary text-white"
                                                            name="cust_kodeUbah" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="kode">Nomor Transaksi
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text"
                                                            class="kodeUbah form-control bg-secondary text-white"
                                                            name="kodeUbah" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Pilih Barang
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select disabled class="barangUbah form-control bg-secondary text-white" id="val-skill2"
                                                            name="val-skill2">

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="qty">Quantity <span
                                                            class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-5">
                                                        <input type="number" class="qty form-control" id="qtyUbah"
                                                            name="qtyUbah" placeholder="">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <input type="text" class="kuotaUbah form-control disabled"
                                                            id="kuotaUbah" name="kuotaUbah" placeholder="" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="diskonKecil">Diskon
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="diskonKecilUbah form-control"
                                                            id="diskonKecilUbah" name="diskonKecilUbah" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="button"
                                                            class="pesanUbah btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
            Content body end
        ***********************************-->
@endsection
@push('script')
<!-- Scripts -->
<script>
    toastr.options.timeOut = 5e3;
    toastr.options.positionClass = "toast-top-right";
    toastr.options.closeButton = !0;
    toastr.options.debug = !1;
    toastr.options.newestOnTop = !0;
    toastr.options.progressBar = !0;
    toastr.options.onclick = null;
    toastr.options.showDuration = "300";
    toastr.options.hideDuration = "1000";
    toastr.options.extendedTimeOut = "1000";

    $("#batal").click(function(e){
        location.reload(true);
    });

    $('#val-nomor').on('click', function () {
        if (!$(this).val()) {
            toastr.error('Harap Pilih Tanggal Terlebih Dahulu!');
        } else {
            toastr.warning('Nomor Transaksi Tidak Dapat Diubah Secara Manual!');
        }
    });

    $('#val-tgl').change(function (e) {
        var pickedDate = $(this).val();
        let text = pickedDate.toString();
        var str = text.split('-').join('');
        var id = $('#val-nomor').data('id');
        var generate = pad(id);
        $('#val-nomor').val(str + '-' + generate);
        $("#pilihKode").removeClass("disabled");
    });

    $('#pilihKode').on('click', function () {
        if ($(this).hasClass("disabled")) {
            toastr.error('Harap Pilih Tanggal Terlebih Dahulu!');
            return false;
        }
    });

    $('#newData').on('click', function () {
        if ($(this).hasClass("disabled")) {
            toastr.error('Harap Pilih Customer Terlebih Dahulu!');
            return false;
        }
    });

    $('#simpan').on('click', function () {
        if ($(this).hasClass("disabled")) {
            toastr.error('Harap Pilih Barang Terlebih Dahulu!');
            return false;
        }
    });

    $('#qty').on('click', function () {
        if ($(this).hasClass("disabled")) {
            toastr.error('Harap Pilih Barang Terlebih Dahulu!');
            return false;
        }
    });

    $('#diskonKecil').on('click', function () {
        if ($(this).hasClass("disabled")) {
            toastr.error('Harap Pilih Barang Terlebih Dahulu!');
            return false;
        }
    });

    function pad(n) {
        var s = "000" + n;
        return s.substr(s.length - 4);
    }

    jQuery(document).delegate('.pesan', 'click', function (e) {
        e.preventDefault();
        if (!$('#val-skill').val()) {
            toastr.warning('Harap Pilih Barang!');
            return false;
        }
        if ($('#qty').val() <= 0 || !$('#qty').val()) {
            toastr.warning('Harap isi kuantiti barang dan minimal 1 atau lebih!');
            return false;
        }
        var diskonKecil = $('#diskonKecil').val();
        var content = jQuery('#sample_table tr'),
            size = jQuery('#tbl_posts >tbody >tr').length + 1,
            element = null,
            element = content.clone();
        var value = $('#val-skill :selected').val();
        $.ajax({
            type: 'GET',
            url: '{{ route('transaksi.getBarang') }}',
            dataType: 'json',
            data: {
                'search': value,
                'qty': $('#qty').val()
            },
            success: function (data) {
                if (data.data == '') {
                    toastr.warning('Data tidak tersedia');
                    return false;
                } else {
                    element.attr('id', 'rec-' + size);
                    element.find('.delete-record').attr('data-id', size);
                    element.find('.delete-record').attr('data-idpilih', data.data.id);
                    element.find('.delete-record').attr('data-namapilih', data.data.nama);
                    element.find('.delete-record').attr('data-hargapilih', data.data.harga);
                    element.find('.delete-record').attr('data-kuantitipilih', data.data.kuantiti);
                    element.find('.delete-record').attr('data-kuantiti', $('#qty').val());
                    element.appendTo('#tbl_posts_body');
                    element.find('.sn').html(size);
                    element.find('.kodeBTabel').html(data.data.kode);
                    element.find('.namaBTabel').html(data.data.nama);
                    element.find('.totalQty').html($('#qty').val());
                    element.find('.hargaBAwal').html(formatRupiah(parseInt(data.data.harga),'Rp. '));
                    element.find('.diskonBInput').html($('#diskonKecil').val() + '%');
                    element.find('.diskonBRp').html(formatRupiah(Math.round((data.data.harga * $('#diskonKecil').val()) / 100, 'Rp. ')));
                    element.find('.hargaDiskon').html(formatRupiah(Math.round(data.data.harga - ((data.data.harga * $('#diskonKecil').val()) / 100)), 'Rp. '));
                    element.find('.totalSem').html(formatRupiah(Math.round($('#qty').val() * (data.data.harga-((data.data.harga * $('#diskonKecil').val()) / 100))), 'Rp. '));
                    element.find('.kodeBTabel').attr('data-kodeBTabel', data.data.kode);
                    element.find('.ubahTombol').attr('data-id', data.data.id);
                    element.find('.ubahTombol').attr('data-size', size);
                    element.find('.ubahTombol').attr('data-kodebarang', data.data.kode);
                    element.find('.ubahTombol').attr('data-namabarang', data.data.nama);
                    element.find('.ubahTombol').attr('data-harga', data.data.harga);
                    element.find('.ubahTombol').attr('data-kuantitibarang', $('#qty').val());
                    element.find('.ubahTombol').attr('data-kuantititotal', data.data.kuantiti);
                    element.find('.ubahTombol').attr('data-diskon', $('#diskonKecil').val());
                    element.find('.totalQty').attr('data-totalQty', $('#qty').val());
                    element.find('.hargaBAwal').attr('data-hargaBAwal', data.data.harga);
                    element.find('.diskonBInput').attr('data-diskonBInput', $('#diskonKecil').val());
                    element.find('.diskonBRp').attr('data-diskonBRp', (Math.round(data.data.harga * $('#diskonKecil').val()) / 100));
                    element.find('.hargaDiskon').attr('data-hargaDiskon', Math.round(data.data.harga - ((data.data.harga * $('#diskonKecil').val()) / 100)));
                    element.find('.totalSem').attr('data-totalsem', Math.round($('#qty').val() * (data.data.harga - ((data.data.harga * $('#diskonKecil').val()) / 100))));
                    $('#diskonBesar').val('');
                    $('#ongkir').val('');
                    subTotal();
                    $("#qty").addClass("disabled");
                    $("#diskonKecil").addClass("disabled");
                    $("#qty").prop('readonly', true);
                    $("#diskonKecil").prop('readonly', true);
                    $('#val-skill option:first').prop('selected', true);
                    $('#qty').val("");
                    $('#kuota').val("");
                    $('#diskonKecil').val("");
                    $("#val-skill option[value='" + data.data.id + "']").remove();
                    toastr.info('Barang Berhasil Ditambahkan!');
                    $('#tambahData').modal('toggle');
                    $("#simpan").removeClass("disabled");
                }
            },
            error: function (data) {
                toastr.error('Terjadi Kesalahan!');
                return false;
            }
        });
    });

    function subTotal() {
        var TotalValue = 0;
        $("#tbl_posts .totalSem").each(function (index, value) {
            currentRow = parseFloat($(this).data('totalsem'));
            TotalValue += currentRow
        });
        document.getElementById('subTotal').innerHTML = formatRupiah(TotalValue, 'Rp. ');
        $("#subTotal").attr('data-subtotal', TotalValue);
        $("#subTotal").attr('data-subtotalcadangan', TotalValue);
        document.getElementById('total').innerHTML = formatRupiah(TotalValue, 'Rp. ');
        $("#total").attr('data-total', TotalValue);
    }

    function subTotalU(update) {
        var TotalValue = 0;
        $("#tbl_posts .totalSem").each(function (index, value) {
            currentRow = parseFloat($(this).data('totalsem'));
            TotalValue += currentRow
        });
        document.getElementById('subTotal').innerHTML = formatRupiah(TotalValue, 'Rp. ');
        $("#subTotal").attr('data-subtotal', TotalValue);
        $("#subTotal").attr('data-subtotalcadangan', TotalValue);
        document.getElementById('total').innerHTML = formatRupiah(TotalValue, 'Rp. ');
        $("#total").attr('data-total', TotalValue);
    }

    $('#ubahData').on('show.bs.modal', (e) => {
        $.ajax({
            type: 'GET',
            url: '{{ route('transaksi.getBarang') }}',
            dataType: 'json',
            data: {
                'search': $(e.relatedTarget).data('id')
            },
            success: function (data) {
                if (data.data == '') {
                    toastr.warning('Data tidak tersedia');
                    return false;
                } else {
                    $('#ubahData').find('input[name="cust_kodeUbah"]').val($('#tampilKode').val());
                    $('#ubahData').find('input[name="kodeUbah"]').val($('#val-nomor').val());
                    $('#val-skill2').append('<option selected disabled data-harga="' + data.data.harga + '" data-kuantiti="' + data.data.kuantiti + '" value="' + data.data.id + '" >' + data.data.nama + '</option>');
                    $('#ubahData').find('input[name="qtyUbah"]').val($(e.relatedTarget).data('kuantitibarang'));
                    $('#ubahData').find('input[name="kuotaUbah"]').val('Tersedia: ' + data.data.kuantiti);
                    $('#ubahData').find('input[name="diskonKecilUbah"]').val($(e.relatedTarget).data('diskon'));
                }
            },
            error: function (data) {
                toastr.error('Terjadi Kesalahan!');
                return false;
            }
        });
        var kuota = $(e.relatedTarget).data('kuantititotal');
        $('#qtyUbah').keyup(function (a) {
            if ($(this).val() > kuota) {
                toastr.warning('Jumlah yang kamu masukkan melebihi kuantiti yang tersedia!');
                $(this).val("");
                return false;
            }
        });
        $('#diskonKecilUbah').keyup(function (a) {
            if ($(this).val() > 100) {
                toastr.warning('Jumlah yang kamu masukkan melebihi maksimum persentase!');
                $(this).val("");
                return false;
            }
            if ($(this).val() < 0) {
                toastr.warning('Jumlah yang kamu masukkan tidak masuk akal!');
                $(this).val("");
                return false;
            }
        });
        $('.pesanUbah').unbind().click(function (a) { 
            a.preventDefault();
            if ($('#qtyUbah').val() <= 0 || !$('#qtyUbah').val()) {
                toastr.warning('Harap isi kuantiti barang dan minimal 1 atau lebih!');
                return false;
            }
            var value = $('#val-skill2 :selected').val();
            var size = jQuery('#tbl_posts >tbody >tr').length + 1,
                element = null,
                element = $('#rec-'+$(e.relatedTarget).data('size')).clone(),
                kurang = size-1;
                $.ajax({
                    type: 'GET',
                    url: '{{ route('transaksi.getBarangUbah') }}',
                    dataType: 'json',
                    data: {
                        'search': value,
                        'qty': $(e.relatedTarget).data('kuantitibarang'),
                        'qtyUbah': $('#qtyUbah').val()
                    },
                    success: function (data) {
                        if (data.data == '') {
                            toastr.warning('Data tidak tersedia');
                            return false;
                        } else {
                            element.find('.delete-record').attr('data-namapilih', $(e.relatedTarget).data('namabarang'));
                            element.find('.delete-record').attr('data-hargapilih', $(e.relatedTarget).data('harga'));
                            element.find('.delete-record').attr('data-kuantitipilih', $(e.relatedTarget).data('kuantititotal'));
                            element.find('.delete-record').attr('data-kuantiti', $('#qtyUbah').val());
                            element.insertAfter('#rec-'+$(e.relatedTarget).data('size'));
                            element.find('.sn').html(size);
                            element.find('.kodeBTabel').html($(e.relatedTarget).data('kodebarang'));
                            element.find('.namaBTabel').html($(e.relatedTarget).data('namabarang'));
                            element.find('.totalQty').html($('#qtyUbah').val());
                            element.find('.hargaBAwal').html(formatRupiah(parseInt($(e.relatedTarget).data('harga')),'Rp. '));
                            element.find('.diskonBInput').html($('#diskonKecilUbah').val() + '%');
                            element.find('.diskonBRp').html(formatRupiah(Math.round(($(e.relatedTarget).data('harga') * $('#diskonKecilUbah').val()) / 100), 'Rp. '));
                            element.find('.hargaDiskon').html(formatRupiah(Math.round($(e.relatedTarget).data('harga') - (($(e.relatedTarget).data('harga') * $('#diskonKecilUbah').val()) / 100)), 'Rp. '));
                            element.find('.totalSem').html(formatRupiah(Math.round($('#qtyUbah').val() * ($(e.relatedTarget).data('harga')-(($(e.relatedTarget).data('harga') * $('#diskonKecilUbah').val()) / 100))), 'Rp. '));
                            element.find('.kodeBTabel').attr('data-kodeBTabel', $(e.relatedTarget).data('kodebarang'));
                            element.find('.ubahTombol').attr('data-id', $(e.relatedTarget).data('id'));
                            element.find('.ubahTombol').attr('data-kodebarang', $(e.relatedTarget).data('kodebarang'));
                            element.find('.ubahTombol').attr('data-namabarang', $(e.relatedTarget).data('namabarang'));
                            element.find('.ubahTombol').attr('data-harga', $(e.relatedTarget).data('harga'));
                            element.find('.ubahTombol').attr('data-kuantitibarang', $('#qtyUbah').val());
                            element.find('.ubahTombol').attr('data-kuantititotal', $(e.relatedTarget).data('kuantititotal'));
                            element.find('.ubahTombol').attr('data-diskon', $('#diskonKecilUbah').val());
                            element.find('.totalQty').attr('data-totalQty', $('#qtyUbah').val());
                            element.find('.hargaBAwal').attr('data-hargaBAwal', $(e.relatedTarget).data('harga'));
                            element.find('.diskonBInput').attr('data-diskonBInput', $('#diskonKecilUbah').val());
                            element.find('.diskonBRp').attr('data-diskonBRp', Math.round(($(e.relatedTarget).data('harga') * $('#diskonKecilUbah').val()) / 100));
                            element.find('.hargaDiskon').attr('data-hargaDiskon', Math.round($(e.relatedTarget).data('harga') - (($(e.relatedTarget).data('harga') * $('#diskonKecilUbah').val()) / 100)));
                            element.find('.totalSem').attr('data-totalsem', Math.round($('#qtyUbah').val() * ($(e.relatedTarget).data('harga') - (($(e.relatedTarget).data('harga') * $('#diskonKecilUbah').val()) / 100))));
                
                            $('#rec-'+$(e.relatedTarget).data('size')).attr('id', 'rec-' + size + 999);
                            element.attr('id', 'rec-' + $(e.relatedTarget).data('size'));
                            element.find('.delete-record').attr('data-idpilih', $(e.relatedTarget).data('id'));
                            element.find('.ubahTombol').attr('data-size', $(e.relatedTarget).data('size'));
                            element.find('.delete-record').attr('data-id', $(e.relatedTarget).data('size'));
                            $('#rec-'+size+999).remove();
                            $('#tbl_posts_body tr').each(function (index) {
                                //alert(index);
                            $(this).find('span.sn').html(index + 1);
                            });
                            subTotal();
                        }
                    },
                    error: function (data) {
                        toastr.error('Terjadi Kesalahan!');
                        return false;
                    }
                });
            $('#ubahData').modal('hide');
        });
    });

    $('#simpan').unbind().on('click', function (e) {
        e.preventDefault();
        var TotalValue = 0;
        $("#tbl_posts .totalSem").each(function (index, value) {
            currentRow = parseFloat($(this).data('totalsem'));
            TotalValue += currentRow
        });
        let sub = TotalValue;
        var dis = Math.round(($('#diskonBesar').val()*TotalValue)/100);
        var ong = $('#ongkir').val();
        if ($('#diskonBesar').val() == null || $('#diskonBesar').val() == '') {
            dis = 0;
        }
        if ($('#ongkir').val() == null || $('#ongkir').val() == '') {
            ong = 0;
        }
        var data = [],
            subtotal = $('#subTotal').data('subtotal'),
            diskon = dis,
            ongkir = ong,
            total_bayar = $('#total').data('total'),
            cust_id = $('#tampilId').val(),
            tgl = $('#val-tgl').val(),
            kode = $('#val-nomor').val();
        for( i = 1 ; i <= $("#tbl_posts .totalSem").length; i++) {
            data.push({
                sales_id: i,
                barang_id: $('#rec-'+i).find('.controller').data('id'),
                harga_bandrol: $('#rec-'+i).find('.controller').data('harga'),
                qty: $('#rec-'+i).find('.totalQty').data('totalqty'),
                diskon_pct: $('#rec-'+i).find('.diskonBInput').data('diskonbinput'),
                diskon_nilai: $('#rec-'+i).find('.diskonBRp').data('diskonbrp'),
                harga_diskon: $('#rec-'+i).find('.hargaDiskon').data('hargadiskon'),
                total: $('#rec-'+i).find('.totalSem').data('totalsem'),
            });
        }
        console.log(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('transaksi.store') }}',
            dataType: 'json',
            data: {
                'kode': kode,
                'tgl': tgl,
                'cust_id': cust_id,
                'data': data,
                'subtotal': subtotal,
                'diskon': diskon,
                'ongkir': ongkir,
                'total_bayar': total_bayar
            },
            success: function (response) {
                toastr.info(response.success);
                window.onbeforeunload = null;
                window.open('{{ route('home') }}', '_self');
            },
            error: function (response) {
                if (response.message) {
                    toastr.error(response.message);
                }
                if (response.error) {
                    toastr.error(response.error);
                }
                return false;
            }
        });
    });

    jQuery(document).delegate('a.delete-record', 'click', function (e) {
        $.ajax({
            type: 'GET',
            url: '{{ route('transaksi.hapusBarang') }}',
            dataType: 'json',
            data: {
                'qty': $(this).data('kuantiti'),
                'search': $(this).data('idpilih')
            },
            success: function (data) {
                toastr.info('berhasil dihapus dari list pesanan');
            },
            error: function (data) {
                toastr.error('Terjadi Kesalahan!');
                return false;
            }
        });
        $('#val-skill').append('<option data-harga="' + $(this).data('hargapilih') + '" data-kuantiti="' + $(this).data('kuantitipilih') + '" value="' + $(this).data('idpilih') + '" >' + $(this).data('namapilih') + '</option>');
                    var id = jQuery(this).attr('data-id');
                    var targetDiv = jQuery(this).attr('targetDiv');
                    jQuery('#rec-' + id).remove();
                    //regnerate index number on table
                    $('#tbl_posts_body tr').each(function (index) {
                        //alert(index);
                        $(this).find('span.sn').html(index + 1);
                    });
                    subTotal();
    });

    $(document).ready(function () {

        $('.customer').change(function (e) {
            $(".pilihIni").removeClass("disabled");
        });
        $('.pilihIni').on('click', function () {
            if ($(this).hasClass("disabled")) {
                toastr.error('Harap Pilih Customer Terlebih Dahulu!');
                return false;
            }
            $('#tampilId').val($('input[name="gridRadios"]:checked').data('id'));
            $('#tampilKode').val($('input[name="gridRadios"]:checked').data('kode'));
            $('#tampilNama').val($('input[name="gridRadios"]:checked').data('nama'));
            $('#tampilTelp').val($('input[name="gridRadios"]:checked').data('telp'));
            $(".hilang").prop('hidden', true);
            $(".muncul").prop('hidden', false);
            $("#newData").prop('disabled', false);
            $('#basicModal').modal('hide');
            $("#newData").removeClass("disabled");
        });

        $('#tambahData').on('show.bs.modal', (e) => {
            $('#tambahData').find('input[name="cust_id"]').val($('#tampilId').val());
            $('#tambahData').find('input[name="cust_kode"]').val($('#tampilKode').val());
            $('#tambahData').find('input[name="kode"]').val($('#val-nomor').val());
        });

        $('.barang').change(function (e) {
            $('#kuota').val('Tersedia: ' + $('#val-skill :selected').data('kuantiti'));
            $('#tanggal').val($('#val-nomor').val());
            $('#namaBarang').val($('#val-skill :selected').data('nama'));
            $('#kodeBarang').val($('#val-skill :selected').data('kode'));
            $('#hargaBandrol').val($('#val-skill :selected').data('harga'));
            cekKuota();
            $("#qty").removeClass("disabled");
            $("#diskonKecil").removeClass("disabled");
            $("#qty").prop('readonly', false);
            $("#diskonKecil").prop('readonly', false);
        });

        $('#qty').keyup(function (e) {
            cekKuota();
        });


        const setelahDiskon = document.getElementById('diskonBesar');
        const setelahOngkir = document.getElementById('ongkir');
        [setelahDiskon, setelahOngkir].map(element => element.addEventListener('input', function () {
            if ($('#diskonBesar').val() > 100) {
                toastr.warning('Jumlah melebihi persentase maksimum!');
                $('#diskonBesar').val('');
            }
            var TotalValue = 0;
            $("#tbl_posts .totalSem").each(function (index, value) {
                currentRow = parseFloat($(this).data('totalsem'));
                TotalValue += currentRow
            });
            let sub = TotalValue;
            let ongkir = $(setelahOngkir).val();
            let diskon = ($(setelahDiskon).val() * sub) / 100;
            document.getElementById('total').innerHTML = formatRupiah(Math.round((+sub - diskon) + (+ongkir)),
                'Rp. ');
            return $("#total").attr('data-total', (+sub - diskon) + (+ongkir));
        }))

        @if(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @elseif(Session::has('success'))
        toastr.info('{{ Session::get('success') }}');
        @endif

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0 so need to add 1 to make it 1!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("val-tgl").setAttribute("min", today);
    });

    function cekKuota() {
        var kuota = $('#val-skill :selected').data('kuantiti');
        if ($('#qty').val() > kuota) {
            toastr.warning('Jumlah yang kamu masukkan melebihi kuantiti yang tersedia!');
            $('#qty').val("");
            return false;
        }
        $('#diskonKecil').keyup(function (e) {
            if ($('#diskonKecil').val() > 100) {
                toastr.warning('Jumlah yang kamu masukkan melebihi maksimum persentase!');
                $('#diskonKecil').val("");
                return false;
            }
            if ($('#diskonKecil').val() < 0) {
                toastr.warning('Jumlah yang kamu masukkan tidak masuk akal!');
                $('#diskonKecil').val("");
                return false;
            }
        });
    }
    window.onbeforeunload = function () {
        return 'Data akan hilang, apa anda ingin meneruskan?';
    }

    function formatRupiah(angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, ''),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? ',' : '';
            rupiah += separator + ribuan.join(',');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah + '.00' : '');
    }
</script>
@endpush