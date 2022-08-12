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
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Barang</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex d-inline">
                        <h4 class="card-title">Daftar Barang Saat Ini</h4>
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
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#basicModal">Tambah Barang</button>
                        <!-- Modal -->
                        <div class="modal fade" id="basicModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="basic-form">
                                                            <form class="form-valide-with-icon"
                                                                action="{{ route('barang.store') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label class="text-label">Kode</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"> <i
                                                                                    class="fa fa-code"></i> </span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            id="val-kode" name="val-kode"
                                                                            placeholder="Enter kode..">
                                                                        @error('val-kode')
                                                                        <div class="invalid-feedback">
                                                                            {{$message}}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-label">Nama Barang</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"> <i
                                                                                    class="fa fa-user"></i> </span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            id="val-nama" name="val-nama"
                                                                            placeholder="Enter a name..">
                                                                        @error('val-nama')
                                                                        <div class="invalid-feedback">
                                                                            {{$message}}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-label">Harga</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"> Rp. </span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            id="val-harga" name="val-harga"
                                                                            placeholder="Enter a price..">
                                                                        @error('val-harga')
                                                                        <div class="invalid-feedback">
                                                                            {{$message}}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="text-label">Kuantiti</label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text"> <i
                                                                                    class="fa fa-database"
                                                                                    aria-hidden="true"></i> </span>
                                                                        </div>
                                                                        <input type="text" class="form-control"
                                                                            id="val-kuantiti" name="val-kuantiti"
                                                                            placeholder="Enter a kuantiti..">
                                                                        @error('val-kuantiti')
                                                                        <div class="invalid-feedback">
                                                                            {{$message}}
                                                                        </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary simpan">Submit</button>
                                                                <button type="reset"
                                                                    class="btn btn-light">Reset</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example2" class="display table table-striped table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Kuantiti</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($m_barang as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>@currency($item->harga)</td>
                                        <td>{{ $item->kuantiti }}</td>
                                        <td>
                                            <div class="btn-group mb-2 btn-group-sm">
                                                <button class="btn btn-info cek" type="button" data-target="#basicModalUpdate"
                                                data-toggle="modal" data-id="{{ $item->id }}" data-name="{{ $item->nama }}" data-kode="{{ $item->kode }}" data-harga="{{ intval(preg_replace('/[^\d.]/', '', $item->harga)) }}" data-quantity="{{ $item->kuantiti }}"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i></button>
                                                <button class="btn btn-danger" type="button" data-target="#delete"
                                                    data-toggle="modal" data-id="{{ $item->id }}"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </td>
                                    </tr>
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

<div class="modal fade" id="basicModalUpdate">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="form-valide-with-icon-update"
                                        action="{{ route('barang.update') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id">
                                        <div class="form-group">
                                            <label class="text-label">Kode</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fa fa-code"></i> </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    id="val-kode" name="kode"
                                                    placeholder="Enter kode..">
                                                @error('val-kode')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Nama Barang</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fa fa-user"></i> </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    id="val-nama" name="nama"
                                                    placeholder="Enter a name..">
                                                @error('val-nama')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Harga</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> Rp. </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    id="val-harga" name="harga"
                                                    placeholder="Enter a price..">
                                                @error('val-harga')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-label">Kuantiti</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i
                                                            class="fa fa-database"
                                                            aria-hidden="true"></i> </span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    id="val-kuantiti" name="kuantiti"
                                                    placeholder="Enter a kuantiti..">
                                                @error('val-kuantiti')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-primary simpan">Submit</button>
                                        <button type="reset"
                                            class="btn btn-light">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('barang.delete') }}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Hapus</span> Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus Data Barang ini ? Jika dihapus maka data transaksi yang pernah
                    dilakukan juga akan terhapus
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
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
    $('.cek').on('click', function () {
    });

    $('#basicModalUpdate').on('show.bs.modal', (e) => {
        $('#basicModalUpdate').find('input[name="id"]').val($(e.relatedTarget).data('id'));
        $('#basicModalUpdate').find('input[name="kode"]').val($(e.relatedTarget).data('kode'));
        $('#basicModalUpdate').find('input[name="nama"]').val($(e.relatedTarget).data('name'));
        $('#basicModalUpdate').find('input[name="harga"]').val($(e.relatedTarget).data('harga'));
        $('#basicModalUpdate').find('input[name="kuantiti"]').val($(e.relatedTarget).data('quantity'));
    });

    $('#delete').on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        $('#delete').find('input[name="id"]').val(id);
    });
    $(document).ready(function() {
            toastr.options.timeOut = 5e3;
            toastr.options.positionClass= "toast-top-right";
            toastr.options.closeButton= !0;
            toastr.options.debug= !1;
            toastr.options.newestOnTop= !0;
            toastr.options.progressBar= !0;
            toastr.options.onclick= null;
            toastr.options.showDuration = "300";
            toastr.options.hideDuration= "1000";
            toastr.options.extendedTimeOut= "1000";
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.info('{{ Session::get('success') }}');
            @endif
    });
</script>
@endpush