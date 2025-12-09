<style>
    /* Styling Header */
    .card-price {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        padding: 20px;
    }

    .card-price-header {
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .card-price-header h5 {
        color: #007bff;
        margin: 0;
    }

    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .status-active {
        background-color: #d4edda;
        color: #155724;
    }

    .status-inactive {
        background-color: #f8d7da;
        color: #721c24;
    }

    /* Untuk mobile */
    @media (max-width: 576px) {
        .card-price-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .card-price-header > div:last-child {
            align-self: flex-end;
        }

        .table-responsive {
            font-size: 0.85rem;
        }
    }

    /* untuk table delete rute agar sweet alert diatas modal rute */
    .high-z-index {
        z-index: 99999 !important;
    }

    .form-section {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
    }

    .action-buttons .btn {
        margin-right: 5px;
        margin-bottom: 5px;
    }
</style>

<div class="container-fluid py-4">
    <h2 class="mb-4">MASTER DATA PRICE DINGIN</h2>

    <!-- Tabel Data -->
    <div class="card shadow-sm card-price" id="master_table_price_dingin">
        <div class="card-header card-price-header bg-white">
            <div>
                <h2 class="h5 mb-0 text-dark">Data Price Dingin</h2>
                <small class="text-muted">Data harga untuk menyewa kendaraan dingin</small>
            </div>
            <div class="d-flex gap-2">
                <button id="toggleFormDinginBtn" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Tambah Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="pricedinginTable" class="table table-striped table-bordered table-hover w-100">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">No</th>
                            <th width="10%">KODE</th>
                            <th>ITEM</th>
                            <th width="10%">PERIODE</th>
                            <th width="10%">PLAT</th>
                            <th width="10%">JENIS</th>
                            <th width="12%">HARGA</th>
                            <th width="10%">TANGGAL</th>
                            <th width="15%">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan di-load oleh DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Form Input -->
    <div id="formDinginContainer" class="form-section" style="display: none;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Form Data Price Dingin</h4>
            <button type="button" class="btn-close" id="closeFormBtn" aria-label="Close"></button>
        </div>

        <form id="pricedinginForm">
            @csrf
            <input type="hidden" id="pricePendinginId" name="id">

            <div class="row g-4">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">JENIS <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" id="jenis_pricedingin" name="jenis_pricedingin"
                                class="form-control" placeholder="Silahkan Tekan Pilih" readonly required>
                            <button type="button" class="btn btn-outline-primary" id="btnPilihJenis">
                                <i class="bi bi-search me-1"></i> Pilih
                            </button>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">PERIODE <span class="text-danger">*</span></label>
                        <input type="text" id="periode_pricedingin" name="periode_pricedingin"
                               class="form-control" placeholder="Contoh: PERIODE-2024" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">PLAT <span class="text-danger">*</span></label>
                        <input type="text" id="plat_pricedingin" name="periode_pricedingin"
                               class="form-control" required>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">KODE MOBIL<span class="text-danger">*</span></label>
                        <input type="text" id="kode_pricedingin" name="kode_pricedingin"
                               class="form-control" placeholder="Contoh: BRG001"
                               maxlength="20" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">ITEM <span class="text-danger">*</span></label>
                        <input type="text" id="item_pricedingin" name="item_pricedingin"
                               class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">HARGA <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" id="harga_pricedingin" name="harga_pricedingin"
                                   class="form-control" placeholder="0"
                                   min="0" step="1" required>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                <button type="button" id="cancelDinginBtn" class="btn btn-secondary">
                    <i class="fas fa-times me-2"></i>Batal
                </button>
                <button type="submit" id="submitDinginBtn" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Simpan Data
                </button>
            </div>
        </form>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Price Dingin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%">TANGGAL:</th>
                                    <td id="detailTanggal"></td>
                                </tr>
                                <tr>
                                    <th>KODE:</th>
                                    <td id="detailKode"></td>
                                </tr>
                                <tr>
                                    <th>PERIODE:</th>
                                    <td id="detailPeriode"></td>
                                </tr>
                                <tr>
                                    <th>PLAT:</th>
                                    <td id="detailPlat"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="40%">JENIS:</th>
                                    <td id="detailJenis"></td>
                                </tr>
                                <tr>
                                    <th>ITEM:</th>
                                    <td id="detailItem"></td>
                                </tr>
                                <tr>
                                    <th>HARGA:</th>
                                    <td id="detailHarga"></td>
                                </tr>
                                <tr>
                                    <th>USER:</th>
                                    <td id="detailUser"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="15%">USER EDIT:</th>
                                    <td id="detailUserEdit"></td>
                                </tr>
                                <tr>
                                    <th>DIBUAT:</th>
                                    <td id="detailCreatedAt"></td>
                                </tr>
                                <tr>
                                    <th>DIUPDATE:</th>
                                    <td id="detailUpdatedAt"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // ========================== Initialize DataTable ================================
    var table = $('#pricedinginTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('price-rent.data') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },

            { data: 'KODE', name: 'KODE' },
            { data: 'ITEM', name: 'ITEM' },
            { data: 'PERIODE', name: 'PERIODE' },
            { data: 'PLAT', name: 'PLAT' },
            { data: 'JENIS', name: 'JENIS' },
            { data: 'HARGA', name: 'HARGA' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],

        language: {
            search: "Cari:",
            lengthMenu: "Tampil _MENU_ data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Selanjutnya",
                previous: "Sebelumnya"
            }
        }
    });
    // ====================== End Of Initialize DataTable ==============================
    // ========================== Toggle form show/hide ===============================
    $('#toggleFormDinginBtn').click(function() {
        $('#formDinginContainer').toggle();
        resetFormDingin();
        $('#master_table_price_dingin').hide();
    });
    $('#cancelDinginBtn').click(function() {
        $('#formContainer').hide();
        resetFormDingin();
        $('#master_table_price_dingin').show();
        $('#pricedinginTable').DataTable().ajax.reload();
    });
    // ===================== End Of Toggle form show/hide ===============================
    // ============================ Reset form ========================================
    function resetFormDingin() {
        $('#pricedinginForm')[0].reset();
        $('#pricePendinginId').val('');
        $('#submitDinginBtn').text('Simpan Data');
        // Clear validation errors
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').remove();
    }
    // ======================== End Of Reset form ======================================
});
</script>
