<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }

    .w-5 {
        width: 5%;
    }

    .w-10 {
        width: 10%;
    }

    .w-15 {
        width: 15%;
    }

    .w-20 {
        width: 20%;
    }

    .w-25 {
        width: 25%;
    }

    .w-2 {
        width: 2%;
    }
</style>
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <div class="row">
                            <h4>Daftar Investasi</h4>
                            <p>Daftar Investasi yang dilakukan sepanjang Periode Berjalan</p>
                        </div>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addInvestasiModal">Tambah Investasi</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col" class="w-2">No.</th>
                                    <th scope="col" class="w-5">Periode</th>
                                    <th scope="col" class="w-15">Nama Investor</th>
                                    <th scope="col" class="w-5">Modal</th>
                                    <th scope="col" class="w-10">Tujuan</th>
                                    <th scope="col" class="w-5">Tgl. Investasi</th>
                                    <th scope="col" class="w-2">Status</th>
                                    <th scope="col" class="w-5 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($investasi as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= strtoupper($row->periode); ?></td>
                                        <td><?= $row->investor; ?></td>
                                        <td><?= format_rupiah($row->jumlah_modal); ?></td>
                                        <td><?= $row->tujuan; ?></td>
                                        <td><?= mediumdate_indo($row->tgl_investasi); ?></td>
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
                                            <a href="#" class="btn btn-info edit-btn btn-sm text-white mx-1" data-bs-toggle="modal" data-bs-target="#modalDetailInvestasi<?= $row->id; ?>">Detail</a>
                                            <a href="#" class="btn btn-primary edit-btn btn-sm text-white mx-1" data-id="<?= $row->id; ?>" data-bs-toggle="modal" data-bs-target="#editInvestasiModal">Ubah</a>
                                            <button class="btn btn-danger delete-btn btn-sm text-white" data-id="<?= $row->id; ?>">Hapus</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addInvestasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addInvestasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInvestasiModalLabel">Tambah Data Investasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addInvestasiForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 mt-3">
                            <div class="form-group">
                                <label for="periode">Periode:</label>
                                <select class="form-control" name="periode" required>
                                    <option disabled selected>- Pilih Periode -</option>
                                    <?php
                                    $currentYear = date('Y');
                                    $nextYear = $currentYear + 1;

                                    // Loop untuk 12 bulan (mulai dari bulan sekarang)
                                    for ($month = date('n'); $month <= 12; $month++) {
                                        $year = ($month < date('n')) ? $nextYear : $currentYear;
                                        $timestamp = mktime(0, 0, 0, $month, 1, $year);
                                        $formattedMonth = date_indo(date('Y-m', $timestamp)); // Menggunakan helper date_indo
                                        $optionValue = $year . '-' . sprintf("%02d", $month);
                                        ?>
                                        <option value="<?php echo $formattedMonth; ?>"><?php echo $formattedMonth; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6 mt-3">
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
                        <div class="col-lg-6 mt-3">
                            <div class="form-group">
                                <label for="jumlah_modal">Jumlah Modal:</label>
                                <input type="number" class="form-control" name="jumlah_modal" required>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="form-group">
                                <label for="tujuan">Tujuan Investasi:</label>
                                <input type="text" class="form-control" name="tujuan" required>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <div class="form-group">
                                <label for="tgl_investasi">Tanggal Investasi:</label>
                                <input type="date" class="form-control" name="tgl_investasi" required>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
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
                        <div class="col-lg-6 mt-3">
                            <div class="form-group">
                                <label for="tgl_mulai">Estimasi Mulai:</label>
                                <input type="date" class="form-control" name="tgl_mulai" required>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
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

<?php if (empty($investasi)) : ?>
    <!-- Modal jika tabel kosong -->
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <?php foreach ($investasi as $row) : ?>
        <div class="modal fade" id="modalDetailInvestasi<?= $row->id; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetailInvestasi<?= $row->id; ?>Label" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailInvestasi<?= $row->id; ?>Label">Detail hasil investasi <br> <?= $row->investor; ?> periode <?= $row->periode; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td class="mt-4">Periode</td>
                                    <td>:</td>
                                    <td><?= $row->periode; ?></td>
                                </tr>
                                <tr>
                                    <td class="mt-4">Nama Investor</td>
                                    <td>:</td>
                                    <td><?= $row->investor; ?></td>
                                </tr>
                                <tr>
                                    <td class="mt-4">Modal</td>
                                    <td>:</td>
                                    <td><?= $row->jumlah_modal; ?></td>
                                </tr>
                                <tr>
                                    <td class="mt-4">Tujuan</td>
                                    <td>:</td>
                                    <td><?= $row->tujuan; ?></td>
                                </tr>
                                <tr>
                                    <td class="mt-4">Tanggal Investasi</td>
                                    <td>:</td>
                                    <td><?= $row->tgl_investasi; ?></td>
                                </tr>
                                <tr>
                                    <td class="mt-4">Tanggal Rencana Mulai Pekerjaan</td>
                                    <td>:</td>
                                    <td><?= $row->tgl_mulai; ?></td>
                                </tr>
                                <tr>
                                    <td class="mt-4">Tanggal Estimasi Selesai Pekerjaan</td>
                                    <td>:</td>
                                    <td><?= $row->tgl_akhir; ?></td>
                                </tr>
                                <tr>
                                    <td class="mt-4">Status</td>
                                    <td>:</td>
                                    <td><?php
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
                                            </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="modal fade text-left" id="editInvestasiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="editInvestasiModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInvestasiModalLabel">Ubah Status Investasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editInvestasiForm" method="post">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="edit_id" id="edit_id">
                        <input type="hidden" class="form-control" name="edit_periode" id="edit_periode" readonly>
                        <input type="hidden" class="form-control" name="edit_investor" id="edit_investor" readonly>
                        <input type="hidden" class="form-control" name="edit_jumlah_modal" id="edit_jumlah_modal" readonly>
                        <input type="hidden" class="form-control" name="edit_tujuan" id="edit_tujuan" readonly>
                        <input type="hidden" class="form-control" name="edit_tgl_investasi" id="edit_tgl_investasi" readonly>
                        <input type="hidden" class="form-control" name="edit_tgl_mulai" id="edit_tgl_mulai" readonly>
                        <input type="hidden" class="form-control" name="edit_tgl_akhir" id="edit_tgl_akhir" readonly>
                        <div class="col-lg-12">
                            <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Peringatan!</h4>
                                Anda hanya diperkenankan mengubah status data investasi.
                            </div>
                        </div>

                        <div class="col-lg-12 mt-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_status" value="1" id="edit_status">
                                <label class="form-check-label" for="1">
                                    Sedang Berjalan
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_status" value="2" id="edit_status1">
                                <label class="form-check-label" for="2">
                                    Sudah Selesai
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_status" value="3" id="edit_status2">
                                <label class="form-check-label" for="3">
                                    Akan Berjalan
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="edit_status" value="4" id="edit_status3">
                                <label class="form-check-label" for="4">
                                    Rencana
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                    $('#edit_tgl_mulai').val(response.tgl_mulai);
                    $('#edit_tgl_akhir').val(response.tgl_akhir);

                    // Set opsi radio button berdasarkan data dari response.status
                    $('input[name=edit_status][value=' + response.status + ']').prop('checked', true);

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