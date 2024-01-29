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
</style>
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Daftar Investor</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addInvestorModal">Tambah Investor</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col" class="w-5">No.</th>
                                    <th scope="col" class="w-10">Nama Lengkap</th>
                                    <th scope="col" class="w-25">Nama Perusahaan</th>
                                    <th scope="col" class="w-10">Jabatan</th>
                                    <th scope="col" class="w-30">Alamat</th>
                                    <th scope="col" class="w-10">Sumber Dana</th>
                                    <th scope="col" class="w-10">Aksi</th>
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
                                            <a href="#" class="btn btn-primary edit-btn btn-sm text-white" data-id="<?= $row->id; ?>" data-bs-toggle="modal" data-bs-target="#editInvestorModal">Edit</a>
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

<div class="modal fade" id="addInvestorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addInvestorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addInvestorModalLabel">Tambah Data Investor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addInvestorForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group mt-3">
                            <label for="nama_lengkap">Nama Lengkap:</label>
                            <input type="text" class="form-control" name="nama_lengkap" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="nama_perusahaan">Nama Perusahaan:</label>
                            <input type="text" class="form-control" name="nama_perusahaan" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" class="form-control" name="jabatan" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="alamat">Alamat:</label>
                            <textarea type="text" class="form-control" name="alamat" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="sumber_dana">Sumber Dana:</label>
                            <input type="text" class="form-control" name="sumber_dana" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editInvestorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editInvestorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editInvestorModalLabel">Ubah Data Investor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editInvestorForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="edit_id" name="edit_id">
                        <div class="form-group mt-3">
                            <label for="nama_lengkap">Nama Lengkap:</label>
                            <input type="text" class="form-control" name="edit_nama_lengkap" id="edit_nama_lengkap" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="nama_perusahaan">Nama Perusahaan:</label>
                            <input type="text" class="form-control" name="edit_nama_perusahaan" id="edit_nama_perusahaan" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="jabatan">Jabatan:</label>
                            <input type="text" class="form-control" name="edit_jabatan" id="edit_jabatan" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="alamat">Alamat:</label>
                            <textarea type="text" class="form-control" name="edit_alamat" id="edit_alamat" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="sumber_dana">Sumber Dana:</label>
                            <input type="text" class="form-control" name="edit_sumber_dana" id="edit_sumber_dana" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
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