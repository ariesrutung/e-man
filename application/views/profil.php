<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Data Perusahaan</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="<?php echo site_url('auth/create_user'); ?>" class="btn_1">Ubah Data Perusahaan</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Data Perseroan</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Data Pemilik Usaha</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="row">
                                    <div class="col-lg-7 mt-4">
                                        <div class="card">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama Perseroan</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['nama_perseroan']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Lengkap Perseroan</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['alamat_lengkap_perseroan']; ?>
                                                        </td>
                                                    <tr>
                                                        <td>Kegiatan Usaha 1</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['kegiatan_usaha_1']; ?><br>
                                                            <?= $profil['kegiatan_usaha_2']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Modal Usaha</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= format_rupiah($profil['modal_usaha']); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Sertifikat</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['nomor_sertifikat']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIB</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['nib']; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="col-lg-5 d-flex justify-content-center align-items-center">
                                        <img class="w-75" src="<?= base_url(); ?>assets/profil/sk.png" alt="SK">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    <div class="col-lg-7 mt-4">
                                        <div class="card">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama Lengkap</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['nama_lengkap']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Lahir</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= date_indo($profil['tanggal_lahir']); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Lengkap Personal</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['alamat_lengkap_personal']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Induk Kependudukan (NIK)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['nik']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Pokok Wajib Pajak (NPWP)</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['npwp']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>NO. HP</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['no_hp']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?= $profil['email']; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="col-lg-5 d-flex justify-content-center align-items-center">
                                        <img class="w-75" src="<?= base_url(); ?>assets/profil/izin.png" alt="SK">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>