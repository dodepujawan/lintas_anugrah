<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">DATA CUSTOMER</h3>
                    <button class="btn btn-primary" id="add-btn-customer">
                        <i class="fas fa-plus"></i> Tambah Customer
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="mcustomer-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jenis Usaha</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data akan di-load oleh DataTables -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Form -->
<div class="modal fade" id="customer-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Tambah Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="customer-form">
                <div class="modal-body">
                    <div id="form-errors" class="alert alert-danger d-none"></div>

                    <!-- DATA CUSTOMER -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="mb-3">DATA CUSTOMER</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kode" class="form-label">KODE <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="kode" name="kode" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nama" class="form-label">NAMA <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="jenis_usaha" class="form-label">JENIS USAHA</label>
                                    <input type="text" class="form-control" id="jenis_usaha" name="jenis_usaha">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telepon" class="form-label">TELEPON</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="alamat" class="form-label">ALAMAT</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="desa" class="form-label">DESA</label>
                                    <input type="text" class="form-control" id="desa" name="desa">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="kecamatan" class="form-label">KECAMATAN</label>
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="kabupaten" class="form-label">KABUPATEN</label>
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="kota" class="form-label">KOTA</label>
                                    <input type="text" class="form-control" id="kota" name="kota">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="fax" class="form-label">FAX</label>
                                    <input type="text" class="form-control" id="fax" name="fax">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="kontak" class="form-label">KONTAK</label>
                                    <input type="text" class="form-control" id="kontak" name="kontak">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="email" class="form-label">EMAIL</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="npwp" class="form-label">NPWP</label>
                                    <input type="text" class="form-control" id="npwp" name="npwp">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="top_kredit" class="form-label">TOP KREDIT</label>
                                    <input type="text" class="form-control" id="top_kredit" name="top_kredit">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PURCHASING -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="mb-3">PURCHASING</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="purchasing_nama" class="form-label">NAMA</label>
                                    <input type="text" class="form-control" id="purchasing_nama" name="purchasing_nama">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="purchasing_email" class="form-label">EMAIL</label>
                                    <input type="email" class="form-control" id="purchasing_email" name="purchasing_email">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="purchasing_extensi_hp" class="form-label">EXTENSI HP</label>
                                    <input type="text" class="form-control" id="purchasing_extensi_hp" name="purchasing_extensi_hp">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DATA PAJAK -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="mb-3">DATA PAJAK</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="data_pajak_nama" class="form-label">NAMA</label>
                                    <input type="text" class="form-control" id="data_pajak_nama" name="data_pajak_nama">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="data_pajak_npwp" class="form-label">NPWP</label>
                                    <input type="text" class="form-control" id="data_pajak_npwp" name="data_pajak_npwp">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="data_pajak_alamat" class="form-label">ALAMAT</label>
                                    <textarea class="form-control" id="data_pajak_alamat" name="data_pajak_alamat" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="data_pajak_alamat2" class="form-label">ALAMAT 2</label>
                                    <textarea class="form-control" id="data_pajak_alamat2" name="data_pajak_alamat2" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- INFO PEMILIK -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="mb-3">INFO PEMILIK</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="pemilik_nama" class="form-label">NAMA PEMILIK</label>
                                    <input type="text" class="form-control" id="pemilik_nama" name="pemilik_nama">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pemilik_no_ktp_sim" class="form-label">NO. KTP/SIM</label>
                                    <input type="text" class="form-control" id="pemilik_no_ktp_sim" name="pemilik_no_ktp_sim">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="pemilik_tempat_lahir" class="form-label">TEMPAT LAHIR</label>
                                    <input type="text" class="form-control" id="pemilik_tempat_lahir" name="pemilik_tempat_lahir">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pemilik_tgl_lahir" class="form-label">TANGGAL LAHIR</label>
                                    <input type="date" class="form-control" id="pemilik_tgl_lahir" name="pemilik_tgl_lahir">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="pemilik_alamat_rumah" class="form-label">ALAMAT RUMAH</label>
                                    <textarea class="form-control" id="pemilik_alamat_rumah" name="pemilik_alamat_rumah" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="pemilik_desa" class="form-label">DESA</label>
                                    <input type="text" class="form-control" id="pemilik_desa" name="pemilik_desa">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="pemilik_kecamatan" class="form-label">KECAMATAN</label>
                                    <input type="text" class="form-control" id="pemilik_kecamatan" name="pemilik_kecamatan">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="pemilik_kabupaten" class="form-label">KABUPATEN</label>
                                    <input type="text" class="form-control" id="pemilik_kabupaten" name="pemilik_kabupaten">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="pemilik_telepon" class="form-label">TELEPON</label>
                                    <input type="text" class="form-control" id="pemilik_telepon" name="pemilik_telepon">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="pemilik_fax" class="form-label">FAX</label>
                                    <input type="text" class="form-control" id="pemilik_fax" name="pemilik_fax">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pemilik_email" class="form-label">EMAIL</label>
                                    <input type="email" class="form-control" id="pemilik_email" name="pemilik_email">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pemilik_npwp" class="form-label">NPWP</label>
                                    <input type="text" class="form-control" id="pemilik_npwp" name="pemilik_npwp">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="pemilik_agama" class="form-label">AGAMA</label>
                                    <input type="text" class="form-control" id="pemilik_agama" name="pemilik_agama">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- KONTAK SELAIN PEMILIK -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="mb-3">KONTAK SELAIN PEMILIK</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kontak_lain_nama" class="form-label">NAMA</label>
                                    <input type="text" class="form-control" id="kontak_lain_nama" name="kontak_lain_nama">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="kontak_lain_telepon" class="form-label">TELEPON</label>
                                    <input type="text" class="form-control" id="kontak_lain_telepon" name="kontak_lain_telepon">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ACCOUNTING -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="mb-3">ACCOUNTING</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="accounting_nama" class="form-label">NAMA</label>
                                    <input type="text" class="form-control" id="accounting_nama" name="accounting_nama">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="accounting_email" class="form-label">EMAIL</label>
                                    <input type="email" class="form-control" id="accounting_email" name="accounting_email">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="accounting_extensi_hp" class="form-label">EXTENSI HP</label>
                                    <input type="text" class="form-control" id="accounting_extensi_hp" name="accounting_extensi_hp">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="save-btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="view-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="view-content">
                <!-- Content will be loaded by AJAX -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Set CSRF token in AJAX setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // =============================== Initialize DataTables ====================================
    var table = $('#mcustomer-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("customer_get_data") }}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'kode', name: 'kode' },
            { data: 'nama', name: 'nama' },
            { data: 'jenis_usaha', name: 'jenis_usaha' },
            { data: 'telepon', name: 'telepon' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();
    // ============================= End Of Initialize DataTables =================================
    // ===================================== Add button click  =======================================
    $('#add-btn-customer').click(function() {
        $('#customer-form')[0].reset();
        $('#modal-title').text('Tambah Customer');
        $('#customer-form').attr('data-method', 'store');
        $('#customer-modal').modal('show');
        $('#form-errors').addClass('d-none');
    });
    // ================================= End Of Add button click  =================================
    // ===================================== Edit button click =====================================
    $(document).on('click', '.edit-btn-customer', function() {
        var id = $(this).data('id');
        $('#modal-title').text('Edit Customer');
        $('#customer-form').attr('data-method', 'update');
        $('#customer-form').attr('data-id', id);
        $('#form-errors').addClass('d-none');

        // Load data via AJAX
        $.ajax({
            url: '{{ route("customer_show", ["id" => ":id"]) }}'.replace(':id', id),
            type: 'GET',
            success: function(response) {
                if (response.status === 'success') {
                    var customer = response.data;
                    // Populate form fields
                    Object.keys(customer).forEach(function(key) {
                        // console.log('Field:', key, 'Value:', customer[key]);
                        if ($('#' + key).length) {
                            let value = customer[key];
                            if ($('#' + key).attr('type') === 'date' && value) {
                                value = value.split('T')[0];
                            }
                            $('#' + key).val(value); // <--- di sini
                        }
                    });
                    $('#customer-modal').modal('show');
                }
            },
            error: function(xhr) {
                alert('Terjadi kesalahan saat memuat data');
            }
        });
    });
    // =============================== End Of Edit button click ===================================
    // ================================= View button click ===================================
    $(document).on('click', '.view-btn-customer', function() {
        var id = $(this).data('id');

        $.ajax({
            url: '{{ route("customer_show", ["id" => ":id"]) }}'.replace(':id', id),
            type: 'GET',
            success: function(response) {
                if (response.status === 'success') {
                    var customer = response.data;
                    var content = `
                        <div class="row">
                            <div class="col-md-6">
                                <h6>DATA CUSTOMER</h6>
                                <table class="table table-sm">
                                    <tr><th>Kode</th><td>${customer.kode || '-'}</td></tr>
                                    <tr><th>Nama</th><td>${customer.nama || '-'}</td></tr>
                                    <tr><th>Jenis Usaha</th><td>${customer.jenis_usaha || '-'}</td></tr>
                                    <tr><th>Telepon</th><td>${customer.telepon || '-'}</td></tr>
                                    <tr><th>Email</th><td>${customer.email || '-'}</td></tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h6>INFO PEMILIK</h6>
                                <table class="table table-sm">
                                    <tr><th>Nama Pemilik</th><td>${customer.pemilik_nama || '-'}</td></tr>
                                    <tr><th>No. KTP/SIM</th><td>${customer.pemilik_no_ktp_sim || '-'}</td></tr>
                                    <tr><th>Email</th><td>${customer.pemilik_email || '-'}</td></tr>
                                </table>
                            </div>
                        </div>
                    `;
                    $('#view-content').html(content);
                    $('#view-modal').modal('show');
                }
            },
            error: function(xhr) {
                alert('Terjadi kesalahan saat memuat data');
            }
        });
    });
    // =============================== End Of View button click =================================
    // ===================================== Form submit ======================================
    $('#customer-form').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var method = $(this).attr('data-method');
        var id = $(this).attr('data-id');

        var url, httpMethod;

        if (method === 'update') {
            url = '{{ route("customer_update", ["id" => ":id"]) }}'.replace(':id', id);
            httpMethod = 'POST'; // Karena menggunakan POST untuk update dengan method override
        } else {
            url = '{{ route("customer_store") }}';
            httpMethod = 'POST';
        }

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.status === 'success') {
                    $('#customer-modal').modal('hide');
                    table.ajax.reload();
                    alert('Data berhasil disimpan');
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var errorHtml = '<ul>';
                    $.each(errors, function(key, value) {
                        errorHtml += '<li>' + value[0] + '</li>';
                    });
                    errorHtml += '</ul>';
                    $('#form-errors').html(errorHtml).removeClass('d-none');
                } else {
                    alert('Terjadi kesalahan: ' + (xhr.responseJSON?.message || 'Server error'));
                }
            }
        });
    });
    // ================================= End Of Form submit ===================================
    // ================================= Delete button click =================================
    $(document).on('click', '.delete-btn-customer', function() {
        var id = $(this).data('id');

        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            $.ajax({
                url: '{{ route("customer_destroy", ["id" => ":id"]) }}'.replace(':id', id),
                type: 'POST',
                headers: {
                    'X-HTTP-Method-Override': 'DELETE'
                },
                success: function(response) {
                    if (response.status === 'success') {
                        table.ajax.reload();
                        alert('Data berhasil dihapus');
                    }
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan: ' + (xhr.responseJSON?.message || 'Server error'));
                }
            });
        }
    });
    // ============================== End Of Delete button click =================================
    // ================================= Close modal handler =================================
    $('#customer-modal').on('hidden.bs.modal', function () {
        $('#form-errors').addClass('d-none');
    });
    // ============================== End of Close modal handler ==============================
});
</script>
