<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Investor</h3>
                <p class="text-subtitle text-muted">List orang-orang berjasa dalam kemajuan PT. NAKARANA PANGAN PERKASA GROUP dari waktu ke waktu.</p>
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
                <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addInvestorModal">
                    Tambah Data Baru
                </button>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Perusahaan</th>
                            <th>Jabatan</th>
                            <th>Alamat</th>
                            <th>Sumber Dana</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($investor as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->nama_lengkap; ?></td>
                                <td><?= $row->nama_perusahaan; ?></td>
                                <td><?= $row->jabatan; ?></td>
                                <td><?= $row->alamat; ?></td>
                                <td><?= $row->sumber_dana; ?></td>
                                <td>
                                    <a href="#" class="btn btn-warning edit-btn btn-sm" data-id="<?= $row->id; ?>" data-bs-toggle="modal" data-bs-target="#editInvestorModal">Edit</a>
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

<div class="modal fade text-left" id="addInvestorModal" tabindex="-1" role="dialog" aria-labelledby="addInvestorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addInvestorModalLabel">Tambah Data Investor</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form id="addInvestorForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap:</label>
                            <input type="text" class="form-control" name="nama_lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_perusahaan">Nama Perusahaan:</label>
                            <input type="text" class="form-control" name="nama_perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" class="form-control" name="jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat:</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="sumber_dana">Sumber Dana:</label>
                            <input type="text" class="form-control" name="sumber_dana" required>
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

<div class="modal fade text-left" id="editInvestorModal" tabindex="-1" role="dialog" aria-labelledby="editInvestorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editInvestorModalLabel">Edit Data Investasi</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <!-- <form id="editInvestorForm" method="post"> -->
            <form id="editInvestorForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="edit_id" id="edit_id">

                        <div class="form-group">
                            <label for="edit_nama_lengkap">Nama Lengkap:</label>
                            <input type="text" class="form-control" name="edit_nama_lengkap" id="edit_nama_lengkap" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_nama_perusahaan">Nama Perusahaan:</label>
                            <input type="text" class="form-control" name="edit_nama_perusahaan" id="edit_nama_perusahaan" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_jabatan">Jabatan:</label>
                            <input type="text" class="form-control" name="edit_jabatan" id="edit_jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_alamat">Alamat:</label>
                            <input type="text" class="form-control" name="edit_alamat" id="edit_alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_sumber_dana">Sumber Dana:</label>
                            <input type="text" class="form-control" name="edit_sumber_dana" id="edit_sumber_dana" required>
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
        $('#addInvestorForm').submit(function(e) {
            e.preventDefault();

            // Menggunakan AJAX untuk pengiriman form
            $.ajax({
                type: 'POST', // Pastikan metodenya adalah POST
                url: '<?= base_url(); ?>investor/unggah_data_investor',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    $('#addInvestorModal').modal('hide');
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
                    window.location.href = '<?= base_url() ?>investor/delete/' + id;
                }
            });
        });

        $('.edit-btn').click(function() {
            var id = $(this).data('id');

            // Kirim AJAX request untuk mendapatkan data investor berdasarkan ID
            $.ajax({
                type: 'GET',
                url: '<?= base_url() ?>investor/get_investor/' + id,
                dataType: 'json',
                success: function(response) {
                    // Isi form edit dengan data investor
                    $('#edit_id').val(response.id);
                    $('#edit_nama_lengkap').val(response.nama_lengkap);
                    $('#edit_jabatan').val(response.jabatan);
                    $('#edit_alamat').val(response.alamat);
                    $('#edit_sumber_dana').val(response.sumber_dana);
                    $('#edit_nama_perusahaan').val(response.nama_perusahaan);

                    // Tampilkan modal edit
                    $('#editInvestorModal').modal('show');
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // Tambahkan event listener untuk form edit
        $('#editInvestorForm').submit(function(e) {
            e.preventDefault();

            // Kirim AJAX request untuk update data investor
            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>investor/update_investor', // Sesuaikan dengan URL controller Anda
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);

                    // Tutup modal edit
                    $('#editInvestorModal').modal('hide');

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