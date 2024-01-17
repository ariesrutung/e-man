<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Profil Perusahaan</h3>
                <p class="text-subtitle text-muted">Profil PT. NAKARAN PANGAN PERKASA GROUP</p>
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
                    Ubah Data
                </button>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_perseroan">Nama Perseroan:</label>
                                    <input type="text" class="form-control" name="nama_perseroan" id="nama_perseroan" value="<?= $profil['nama_perseroan']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="alamat_lengkap_perseroan">Alamat Lengkap Perseroan:</label>
                                    <input class="form-control" name="alamat_lengkap_perseroan" id="alamat_lengkap_perseroan" value="<?= $profil['alamat_lengkap_perseroan']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="kegiatan_usaha_1">Kegiatan Usaha 1:</label>
                                    <input type="text" class="form-control" name="kegiatan_usaha_1" id="kegiatan_usaha_1" value="<?= $profil['kegiatan_usaha_1']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="kegiatan_usaha_2">Kegiatan Usaha 2:</label>
                                    <input type="text" class="form-control" name="kegiatan_usaha_2" id="kegiatan_usaha_2" value="<?= $profil['kegiatan_usaha_2']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="modal_usaha">Modal Usaha:</label>
                                    <input type="text" class="form-control" name="modal_usaha" id="modal_usaha" value="<?= format_rupiah($profil['modal_usaha']); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap:</label>
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?= $profil['nama_lengkap']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                                    <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= tanggal_indonesia($profil['tanggal_lahir']); ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="alamat_lengkap_personal">Alamat Lengkap Personal:</label>
                                    <input class="form-control" name="alamat_lengkap_personal" id="alamat_lengkap_personal" value="<?= $profil['alamat_lengkap_personal']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nik">Nomor Induk Kependudukan (NIK):</label>
                                    <input type="text" class="form-control" name="nik" id="nik" value="<?= $profil['nik']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="npwp">Nomor Pokok Wajib Pajak (NPWP):</label>
                                    <input type="text" class="form-control" name="npwp" id="npwp" value="<?= $profil['npwp']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nomor_sertifikat">Nomor Sertifikat:</label>
                                    <input type="text" class="form-control" name="nomor_sertifikat" id="nomor_sertifikat" value="<?= $profil['nomor_sertifikat']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="nib">NIB:</label>
                                    <input type="text" class="form-control" name="nib" id="nib" value="<?= $profil['nib']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="no_hp">NO. HP:</label>
                                    <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= $profil['no_hp']; ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $profil['email']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 d-flex justify-content-center align-items-center">
                        <img class="w-75" src="<?= base_url(); ?>assets/profil/sk.png" alt="SK">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>