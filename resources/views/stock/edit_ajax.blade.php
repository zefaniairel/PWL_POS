@empty($stok)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <h5><i class="icon fas fa-ban"></i> Kesalahan!!!</h5>
                        Data yang anda cari tidak ditemukan
                    </div>
                    <a href="{{ url('/stock') }}" class="btn btn-warning">Kembali</a>
                </div>
            </div>
        </div>
    @else
        <form action="{{ url('/stock/' . $stok->stok_id . '/update_ajax') }}" method="POST" id="form-edit">
            @csrf
            @method('PUT')
            <div id="modal-master" class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Stok Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">Supplier</label>
                            <div class="col-11">
                                <select class="form-control" id="supplier_id" name="supplier_id" required>
                                    <option value="">- Pilih supplier -</option>
                                    @foreach ($supplier as $item)
                                        <option {{ $item->supplier_id == $stok->supplier_id ? 'selected' : '' }}
                                            value="{{ $item->supplier_id }}">{{ $item->supplier_nama }}</option>
                                    @endforeach
                                </select>
                                    <small id="error-supplier_id" class="error-text form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">Barang</label>
                            <div class="col-11">
                                <select class="form-control" id="barang_id" name="barang_id" required>
                                    <option value="">- Pilih barang -</option>
                                    @foreach ($barang as $item)
                                        <option {{ $item->barang_id == $stok->barang_id ? 'selected' : '' }}
                                            value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>
                                    @endforeach
                                </select>
                                    <small id="error-barang_id" class="error-text form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">User</label>
                            <div class="col-11">
                                <select class="form-control" id="user_id" name="user_id" required>
                                    <option value="">- Pilih user -</option>
                                    @foreach ($user as $item)
                                        <option {{ $item->user_id == $stok->user_id ? 'selected' : '' }}
                                            value="{{ $item->user_id }}">{{ $item->username }}</option>
                                    @endforeach
                                </select>
                                    <small id="error-user_id" class="error-text form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">Stok Tanggal</label>
                            <div class="col-11">
                                <input type="date" class="form-control" id="stok_tanggal" name="stok_tanggal"
                                    value="{{ $stok->stok_tanggal }}" required>
                                <small id="error-stok_tanggal" class="error-text form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-1 control-label col-form-label">Stok Jumlah</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="stok_jumlah" name="stok_jumlah"
                                    value="{{ $stok->stok_jumlah }}" required>
                                <small id="error-stok_jumlah" class="error-text form-text text-danger"></small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                $("#form-edit").validate({
                    rules: {
                        supplier_id: {
                            required: true,
                            number: true
                        },
                        barang_id: {
                            required: true,
                            number: true
                        },
                        user_id: {
                            required: true,
                            number: true
                        },
                        stok_tanggal: {
                            required: true,
                            minlength: 3
                        },
                        stok_jumlah: {
                            required: true,
                            minlength: 3,
                        }
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            url: form.action,
                            type: form.method,
                            data: $(form).serialize(),
                            success: function(response) {
                                if (response.status) {
                                    $('#myModal').modal('hide');
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.message
                                    });
                                    datastok.ajax.reload();
                                } else {
                                    $('.error-text').text('');
                                    $.each(response.msgField, function(prefix, val) {
                                        $('#error-' + prefix).text(val[0]);
                                    });
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Terjadi Kesalahan',
                                        text: response.message
                                    });
                                }
                            }
                        });
                        return false;
                    },
                    errorElement: 'span',
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            });
        </script>
    @endempty