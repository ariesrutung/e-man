<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Investasi</h3>
                <p class="text-subtitle text-muted">Data ivestasi yang berlaku sepanjang waktu pada PT. NAKARANA PANGAN PERKASA GROUP</p>
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
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addInvestasiModal">
                    Tambah Data Baru
                </button>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Periode</th>
                            <th>Nama Investor</th>
                            <th>Jumlah Modal</th>
                            <th>Tujuan</th>
                            <th>Tanggal Investasi</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($investasi as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->periode; ?></td>
                                <td><?= $row->investor; ?></td>
                                <td><?= $row->jumlah_modal; ?></td>
                                <td><?= $row->tujuan; ?></td>
                                <td><?= $row->tgl_investasi; ?></td>
                                <td><?= $row->tgl_mulai; ?></td>
                                <td><?= $row->tgl_akhir; ?></td>
                                <td>
                                    <?php
                                        $status_text = '';
                                        switch ($row->status) {
                                            case 1:
                                                $status_text = 'Sedang Berjalan';
                                                $badge_class = 'badge bg-primary';
                                                break;
                                            case 2:
                                                $status_text = 'Sudah Selesai';
                                                $badge_class = 'badge bg-secondary';
                                                break;
                                            case 3:
                                                $status_text = 'Akan Berjalan';
                                                $badge_class = 'badge bg-success';
                                                break;
                                            case 4:
                                                $status_text = 'Rencana';
                                                $badge_class = 'badge bg-danger';
                                                break;
                                            default:
                                                $status_text = 'Tidak Diketahui'; // Ganti dengan teks default jika nilai status tidak sesuai dengan yang diharapkan
                                                $badge_class = 'badge bg-secondary';
                                                break;
                                        }
                                        ?>
                                        <span class="<?= $badge_class; ?>">
                                            <?= $status_text; ?>
                                        </span>
                                </td>


                                <td style="width: 17%; text-align: center;">
                                    <a href="<?= base_url(); ?>belanja" class="btn btn-info edit-btn btn-sm">Lihat</a>
                                    <a href="#" class="btn btn-warning edit-btn btn-sm mx-1" data-id="<?= $row->id; ?>" data-bs-toggle="modal" data-bs-target="#editInvestasiModal">Edit</a>
                                    <button class="btn btn-danger delete-btn btn-sm" data-id="<?= $row->id; ?>">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

<div class="modal fade text-left" id="addInvestasiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Investasi </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="addInvestasiForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="periode">Periode:</label>
                                <input type="text" class="form-control" name="periode" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="investor">Nama Investor:</label>
                                <select class="form-control" name="investor" required>
                                    <option selected="selected" disabled> - Pilih - </option>
                                    <?php foreach ($nama_investor as $investor) : ?>
                                        <option value="<?= $investor['nama_lengkap']; ?> - <?= $investor['jabatan']; ?> <?= $investor['nama_perusahaan']; ?>"><?= $investor['nama_lengkap']; ?> - <?= $investor['jabatan']; ?> <?= $investor['nama_perusahaan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="jumlah_modal">Jumlah Modal:</label>
                                <input type="number" class="form-control" name="jumlah_modal" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tujuan">Tujuan Investasi:</label>
                                <input type="text" class="form-control" name="tujuan" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tgl_investasi">Tanggal Investasi:</label>
                                <input type="date" class="form-control" name="tgl_investasi" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="status">Status Pekerjaan:</label>
                                <select name="status" class="form-control" required>
                                    <option selected="selected" disabled> - Pilih - </option>
                                    <option value="1">Sedang Berjalan</option>
                                    <option value="2">Sudah Selesai</option>
                                    <option value="3">Akan Berjalan</option>
                                    <option value="4">Rencana</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tgl_mulai">Estimasi Mulai:</label>
                                <input type="date" class="form-control" name="tgl_mulai" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tgl_akhir">Estimasi Selesai:</label>
                                <input type="date" class="form-control" name="tgl_akhir" required>
                            </div>
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

<div class="modal fade text-left" id="editInvestasiModal" tabindex="-1" role="dialog" aria-labelledby="editInvestasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editInvestasiModalLabel">Edit Data Investasi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="editInvestasiForm" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <div class="col-lg-12">
                            <div class="alert alert-light-warning color-warning">
                                <h4 class="alert-heading">Peringatan!</h4>
                                <p>Anda hanya diperkenankan mengubah status data investasi.</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_periode">Periode:</label>
                                <input type="text" class="form-control" name="edit_periode" id="edit_periode" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_investor">Nama Investor:</label>
                                <input type="text" class="form-control" name="edit_investor" id="edit_investor" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_jumlah_modal">Jumlah Modal:</label>
                                <input type="number" class="form-control" name="edit_jumlah_modal" id="edit_jumlah_modal" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_tujuan">Tujuan Investasi:</label>
                                <input type="text" class="form-control" name="edit_tujuan" id="edit_tujuan" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_tgl_investasi">Tanggal Investasi:</label>
                                <input type="date" class="form-control" name="edit_tgl_investasi" id="edit_tgl_investasi" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_status">Status:</label>
                                <select name="edit_status" id="edit_status" class="form-control" required>
                                    <option selected="selected" disabled> - Pilih - </option>
                                    <option value="1">Sedang Berjalan</option>
                                    <option value="2">Sudah Selesai</option>
                                    <option value="3">Akan Berjalan</option>
                                    <option value="4">Rencana</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_tgl_mulai">Tanggal Mulai:</label>
                                <input type="date" class="form-control" name="edit_tgl_mulai" id="edit_tgl_mulai" required readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="edit_tgl_akhir">Tanggal Selesai:</label>
                                <input type="date" class="form-control" name="edit_tgl_akhir" id="edit_tgl_akhir" required readonly>
                            </div>
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
        $('#addInvestasiForm').submit(function(e) {
            e.preventDefault();

            // Menggunakan AJAX untuk pengiriman form
            $.ajax({
                type: 'POST', // Pastikan metodenya adalah POST
                url: '<?= base_url(); ?>investasi/unggah_data_investasi',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    $('#addInvestasiModal').modal('hide');
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
                    window.location.href = '<?= base_url() ?>investasi/delete/' + id;
                }
            });
        });

        $('.edit-btn').click(function() {
            var id = $(this).data('id');

            // Kirim AJAX request untuk mendapatkan data investasi berdasarkan ID
            $.ajax({
                type: 'GET',
                url: '<?= base_url() ?>investasi/get_investasi/' + id, // Sesuaikan dengan URL controller Anda
                dataType: 'json',
                success: function(response) {
                    // Isi form edit dengan data investasi
                    $('#edit_id').val(response.id);
                    $('#edit_periode').val(response.periode);
                    $('#edit_investor').val(response.investor);
                    $('#edit_jumlah_modal').val(response.jumlah_modal);
                    $('#edit_tujuan').val(response.tujuan);
                    $('#edit_tgl_investasi').val(response.tgl_investasi);
                    $('#edit_status').val(response.status);
                    $('#edit_tgl_mulai').val(response.tgl_mulai);
                    $('#edit_tgl_akhir').val(response.tgl_akhir);

                    // Tampilkan modal edit
                    $('#editInvestasiModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Tambahkan event listener untuk form edit
        $('#editInvestasiForm').submit(function(e) {
            e.preventDefault();

            // Kirim AJAX request untuk update data investasi
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>investasi/update_investasi', // Sesuaikan dengan URL controller Anda
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);

                    // Tutup modal edit
                    $('#editInvestasiModal').modal('hide');

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