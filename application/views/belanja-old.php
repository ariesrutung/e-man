<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Daftar Pengelola Aplikasi</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDataBelanja">Tambah Data Baru</a>
                                <button class="btn btn-info text-white" id="generatePDFBtn">Generate PDF</button>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Transaksi.</th>
                                    <th>Nama Item/Produk</th>
                                    <th>Jumlah Item</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Satuan</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $jumlah_modal = 0;

                                foreach ($belanja as $key) :
                                    $jumlah_modal += $key->harga_total; // Hitung total modal di dalam loop
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $key->id_transaksi; ?></td>
                                        <td><?= $key->nama_item; ?></td>
                                        <td><?= $key->jumlah_item; ?></td>
                                        <td><?= $key->tanggal_transaksi; ?></td>
                                        <td>
                                            <?php
                                                $satuan_text = '';
                                                switch ($key->satuan) {
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
                                        <td><?= format_rupiah($key->harga_satuan); ?></td>
                                        <td><?= format_rupiah($key->harga_total); ?></td>
                                        <td>
                                            <a href="#" class="btn btn-primary edit-btn text-white" data-id="<?= $key->id; ?>" data-bs-toggle="modal" data-bs-target="#editBelanjaModal">Edit</a>
                                            <a href="#" class="btn btn-danger edit-btn text-white" data-id="<?= $key->id; ?>" data-bs-toggle="modal" data-bs-target="modalHapusDataBelanja<?= $key->id; ?>">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td colspan="6"><strong>Total Modal</strong></td>
                                    <td>
                                        <h6><?= format_rupiah($jumlah_modal); ?></h6>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="addDataBelanja" tabindex="-1" role="dialog" aria-labelledby="addDataBelanjaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addDataBelanjaLabel">Tambah Data Belanja </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="addBelanjaForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group mb-4">
                            <label for="nama_item">Nama Item/Produk:</label>
                            <input type="text" class="form-control" name="nama_item" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="jumlah_item">Jumlah Item:</label>
                            <input type="number" class="form-control" name="jumlah_item" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="satuan">Satuan:</label>
                            <select name="satuan" id="satuan" class="form-control" required>
                                <option selected="selected" disabled> - Pilih - </option>
                                <option value="1">Box</option>
                                <option value="2">Pcs</option>
                                <option value="3">Sak</option>
                                <option value="4">ekor</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="harga_satuan">Harga Satuan:</label>
                            <input type="number" class="form-control" name="harga_satuan" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan Data</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- 
<?php foreach ($belanja as $key) : ?>
    <div class="modal fade" id="modalHapusDataBelanja<?= $key->id; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalHapusDataBelanja<?= $key->id; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHapusDataBelanja<?= $key->id; ?>Label">Peringatan!</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open("auth/deactivate/" . $key->id); ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Apakah Anda yakin ingin menonaktifkan user <?= $key->{$identity}; ?></p>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="confirm" id="yes" value="yes" checked>
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="confirm" id="no" value="no">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_hidden($csrf); ?>
                    <?php echo form_hidden(['id' => $user->id]); ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary text-white">Simpan</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

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
                        <div class="form-group mb-4">
                            <label for="nama_item">Nama Item/Produk:</label>
                            <input type="text" class="form-control" name="nama_item" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="jumlah_item">Jumlah Item:</label>
                            <input type="number" class="form-control" name="jumlah_item" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="satuan">Satuan:</label>
                            <select name="satuan" id="satuan" class="form-control" required>
                                <option selected="selected" disabled> - Pilih - </option>
                                <option value="1">Box</option>
                                <option value="2">Pcs</option>
                                <option value="3">Sak</option>
                                <option value="4">ekor</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for="harga_satuan">Harga Satuan:</label>
                            <input type="number" class="form-control" name="harga_satuan" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan Data</span>
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

                        <div class="form-group mt-4">
                            <label for="edit_nama_item">Nama Item/Produk:</label>
                            <input type="text" class="form-control" name="edit_nama_item" id="edit_nama_item" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="edit_jumlah_item">Jumlah Item:</label>
                            <input type="number" class="form-control" name="edit_jumlah_item" id="edit_jumlah_item" required>
                        </div>
                        <div class="form-group mt-4">
                            <label for="edit_satuan">Satuan:</label>
                            <select name="edit_satuan" id="edit_satuan" class="form-control" id="edit_satuan" required>
                                <option selected="selected" disabled> - Pilih - </option>
                                <option value="1">Box</option>
                                <option value="2">Pcs</option>
                                <option value="3">Sak</option>
                                <option value="4">ekor</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="edit_harga_satuan">Harga Satuan:</label>
                            <input type="number" class="form-control" name="edit_harga_satuan" id="edit_harga_satuan" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> -->

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