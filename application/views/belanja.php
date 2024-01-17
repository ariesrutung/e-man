<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Belanja</h3>
                <p class="text-subtitle text-muted">Data belanja produk PT. NAKARAN PANGAN PERKASA GROUP</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Datatable</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addBelanjaModal">
                    Tambah Data Baru
                </button>
                <button class="btn btn-primary btn-sm" id="generatePDFBtn">Generate PDF</button>
            </div>
            <div class="card-body">
                <table class="table table-striped~" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Item/Produk</th>
                            <th>Jumlah Item</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $total_modal = 0;

                        foreach ($belanja as $row) :
                            $total_modal += $row->grand_total; // Hitung total modal di dalam loop
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->nama_item; ?></td>
                                <td><?= $row->jumlah_item; ?></td>
                                <td>
                                    <?php
                                        $satuan_text = '';
                                        switch ($row->satuan) {
                                            case 1:
                                                $satuan_text = 'Box';
                                                break;
                                            case 2:
                                                $satuan_text = 'Pcs';
                                                break;
                                            case 3:
                                                $satuan_text = 'Sak';
                                                break;
                                            case 4:
                                                $satuan_text = 'Ekor';
                                                break;
                                            default:
                                                $satuan_text = 'Tidak Diketahui'; // Ganti dengan teks default jika nilai satuan tidak sesuai dengan yang diharapkan
                                                break;
                                        }
                                        ?>
                                        <span>
                                            <?= $satuan_text; ?>
                                        </span>
                                </td>
                                <td><?= $row->harga_satuan; ?></td>
                                <td><?= $row->grand_total; ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning edit-btn btn-sm" data-id="<?= $row->id; ?>" data-bs-toggle="modal" data-bs-target="#editBelanjaModal">Edit</a>
                                    <button class="btn btn-danger delete-btn btn-sm" data-id="<?= $row->id; ?>">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <!-- Bagian Total Modal di luar loop -->
                        <tr>
                            <td colspan="1"></td> <!-- Sesuaikan jumlah kolom pada tbody -->
                            <td><strong>Total Modal</strong></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong><?= $total_modal; ?></strong></td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>

    </section>
</div>

<div class="modal fade text-left" id="addBelanjaModal" tabindex="-1" role="dialog" aria-labelledby="addBelanjaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addBelanjaModalLabel">Tambah Data Belanja </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="addBelanjaForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="nama_item">Nama Item/Produk:</label>
                            <input type="text" class="form-control" name="nama_item" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_item">Jumlah Item:</label>
                            <input type="number" class="form-control" name="jumlah_item" required>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan:</label>
                            <select name="satuan" id="satuan" class="form-control" required>
                                <option selected="selected" disabled> - Pilih - </option>
                                <option value="1">Box</option>
                                <option value="2">Pcs</option>
                                <option value="3">Sak</option>
                                <option value="4">ekor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga_satuan">Harga Satuan:</label>
                            <input type="number" class="form-control" name="harga_satuan" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="editBelanjaModal" tabindex="-1" role="dialog" aria-labelledby="editBelanjaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editBelanjaModalLabel">Edit Data Investasi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="editBelanjaForm" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="edit_id" id="edit_id">

                        <div class="form-group">
                            <label for="edit_nama_item">Nama Item/Produk:</label>
                            <input type="text" class="form-control" name="edit_nama_item" id="edit_nama_item" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_jumlah_item">Jumlah Item:</label>
                            <input type="number" class="form-control" name="edit_jumlah_item" id="edit_jumlah_item" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_satuan">Satuan:</label>
                            <select name="edit_satuan" id="edit_satuan" class="form-control" id="edit_satuan" required>
                                <option selected="selected" disabled> - Pilih - </option>
                                <option value="1">Box</option>
                                <option value="2">Pcs</option>
                                <option value="3">Sak</option>
                                <option value="4">ekor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_harga_satuan">Harga Satuan:</label>
                            <input type="number" class="form-control" name="edit_harga_satuan" id="edit_harga_satuan" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // JavaScript untuk menangani pengiriman form dan menutup modal
    $(document).ready(function() {
        // Submit form
        $('#addBelanjaForm').submit(function(e) {
            e.preventDefault();

            // Menggunakan AJAX untuk pengiriman form
            $.ajax({
                type: 'POST', // Pastikan metodenya adalah POST
                url: '<?= base_url(); ?>belanja/unggah_data_belanja',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    $('#addBelanjaModal').modal('hide');
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $('.delete-btn').click(function() {
            var id = $(this).data('id');

            // Tampilkan Sweet Alert
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                // Jika tombol "Hapus" ditekan
                if (result.isConfirmed) {
                    // Kirim request penghapusan ke controller
                    window.location.href = '<?= base_url() ?>belanja/delete/' + id;
                }
            });
        });

        $('.edit-btn').click(function() {
            var id = $(this).data('id');

            // Kirim AJAX request untuk mendapatkan data belanja berdasarkan ID
            $.ajax({
                type: 'GET',
                url: '<?= base_url() ?>belanja/get_belanja/' + id, // Sesuaikan dengan URL controller Anda
                dataType: 'json',
                success: function(response) {
                    // Isi form edit dengan data belanja
                    $('#edit_id').val(response.id);
                    $('#edit_nama_item').val(response.nama_item);
                    $('#edit_jumlah_item').val(response.jumlah_item);
                    $('#edit_satuan').val(response.satuan);
                    $('#edit_harga_satuan').val(response.harga_satuan);

                    // Tampilkan modal edit
                    $('#editBelanjaModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Tambahkan event listener untuk form edit
        $('#editBelanjaForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>belanja/update_belanja', // Sesuaikan dengan URL controller Anda
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);

                    // Tutup modal edit
                    $('#editBelanjaModal').modal('hide');

                    // Reload halaman untuk menampilkan data terbaru
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#generatePDFBtn").click(function() {
            window.location.href = "<?= base_url('belanja/cetak'); ?>";
        });
    });
</script>