<style>
    .card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        padding: 20px;
    }

    .card-prices-customer-header {
        border-bottom: 2px solid #007bff;
        padding-bottom: 10px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .card-prices-customer-header h5 {
        color: #007bff;
        margin: 0;
    }

    /* Untuk mobile */
    @media (max-width: 576px) {
        .card-prices-customer-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .card-prices-customer-header > div:last-child {
            align-self: flex-end;
        }
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .btn {
        border-radius: 6px;
        font-weight: 500;
    }

    .form-label {
        font-weight: 500;
        color: #495057;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-prices-customer-header">
                    <div>
                        <h5>Harga Customer</h5>
                    </div>
                </div>
                <div class="card-body">
                    {{-- View Table Cust All --}}
                    <div class="table-responsive" id="priceCusTableMaster">
                        <table class="table table-bordered table-striped" id="priceCusTable">
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

                    {{-- View Table Detail Cust --}}
                    <div id="priceCusTableDetMaster" style="display:none;">
                        <div id="customerInfo" class="alert alert-info" style="display:none;">
                            <strong>Customer:</strong> <span id="custName"></span>
                            (<span id="custKode"></span>)
                        </div>
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="priceCusTableDet" class="table table-striped table-bordered w-100">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>NAMA ITEM</th>
                                                <th>DARI</th>
                                                <th>SAMPAI</th>
                                                <th>RUTE</th>
                                                <th>HARGA</th>
                                                <th>JENIS</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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
    var table = $('#priceCusTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("price-customer.data") }}',
        // Scroll settings
        scrollX: true,
        scrollY: "400px",
        scrollCollapse: true,
        // Responsive settings
        responsive: true,
        autoWidth: false,
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
    // =========================== Initialize DataTables Detail Cus ===============================
    $(document).on("click", ".view-btn-customer", function() {

        let kodecus = $(this).data("id"); // ambil kode customer

        $("#priceCusTableMaster").hide();
        $("#priceCusTableDetMaster").show();

        // hancurkan datatable jika sudah pernah dipakai
        if ($.fn.DataTable.isDataTable('#priceCusTableDet')) {
            $('#priceCusTableDet').DataTable().destroy();
        }

        // rebuild datatable
        $('#priceCusTableDet').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('price-customer.price', ':kode') }}".replace(':kode', kodecus),
                dataSrc: function (json) {
                    // SET INFO CUSTOMER DI ATAS TABEL
                    $("#customerInfo").show();
                    $("#custName").text(json.customer_nama);
                    $("#custKode").text(json.customer_kode);

                    return json.data;
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'KETERANGAN' },
                { data: 'DARI' },
                { data: 'SAMPAI' },
                { data: 'RUTE' },
                { data: 'harga_html', orderable: false, searchable: false },
                { data: 'jenis_text' },
                { data: 'aksi', orderable: false, searchable: false }
            ]
        });

    });
    // ======================== End Of Initialize DataTables Detail Cus ==============================
    // ================================ Update Row Cust ========================================
    $(document).on("click", ".save-price", function() {
        let btn = $(this);
        let kode = btn.data("kode");
        let kodecus = $("#custKode").text().trim();
        let original = btn.data("original");

        let hargaCell = btn.closest("tr").find(".editable-price");
        let hargaBaru = hargaCell.text().trim();

        if (isNaN(hargaBaru) || hargaBaru === "") {
            Swal.fire("Error", "Harga harus angka!", "error");
            hargaCell.text(original);
            return;
        }

        Swal.fire({
            title: "Simpan Perubahan?",
            text: "Harga akan disimpan ke pricecus.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, simpan",
            cancelButtonText: "Batal"
        }).then((result) => {

            if (!result.isConfirmed) {
                hargaCell.text(original);
                return;
            }

            $.ajax({
                url: "{{ route('price-customer.update-row') }}",
                method: "POST",
                data: {
                    kode: kode,
                    kodecus: kodecus,
                    harga: hargaBaru,
                    _token: "{{ csrf_token() }}"
                },
                success: function(res) {
                    Swal.fire("Berhasil", res.message, "success");
                    btn.data("original", hargaBaru);
                    hargaCell.attr("data-original", hargaBaru);
                },
                error: function() {
                    Swal.fire("Error", "Gagal update harga!", "error");
                    hargaCell.text(original);
                }
            });
        });
    });
    // ========================= End Of Update Row Cust =====================================

});
</script>
