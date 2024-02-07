<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    #modalTambahPembelian .table .thead-light th {
        color: #8898aa;
        background-color: #f6f9fc;
        vertical-align: middle;
    }

    #modalTambahPembelian tbody td {
        vertical-align: middle !important;
        padding: 5px;
    }

    #modalTambahPembelian .text-bold {
        font-weight: bold;
        font-size: 16px !important;
    }

    #modalTambahPembelian input#grand_total {
        font-weight: bold;
        opacity: 1 !important;
        background-color: transparent !important;
        color: #000;
    }

    #modalTambahPembelian th.text-bold {
        vertical-align: middle;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    #tanggalTransaksi {
        color: #8898aa;
        font-size: 12px;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }

    @media (min-width: 992px) {

        #modalTambahPembelian .modal-lg,
        #modalTambahPembelian .modal-xl {
            max-width: 80% !important;
        }
    }

    #btnHapus .btn-danger:hover {
        cursor: not-allowed;
        background-color: #dc3545 !important;
        border-color: #dc3545 !important;
    }

    .pilihanKedua {
        cursor: not-allowed;
    }

    #tabelDetailPembelian tfoot th {
        font-size: 14px !important;
        font-weight: bold !important;
        color: #4d4f5c !important;
        border: 0;
    }
</style>
<div class="main_content_iner ">
    <div class="container-fluid plr_30 body_white_bg pt_30">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="QA_section">
                    <div class="white_box_tittle list_header">
                        <h4>Daftar Belanja Item/Barang</h4>
                        <div class="box_right d-flex lms_block">
                            <div class="add_button ms-2">
                                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPembelian">Tambah Pembelian</a>
                            </div>
                        </div>
                    </div>
                    <div class="QA_table ">
                        <table class="table lms_table_active">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">ID Transaksi</th>
                                    <th scope="col">Periode</th>
                                    <th scope="col">Investor</th>
                                    <th scope="col">Modal Investasi</th>
                                    <th scope="col">Jumlah Item</th>
                                    <th scope="col">Tgl. Transaksi</th>
                                    <!-- <th scope="col">Selisih</th> -->
                                    <th scope="col">Total Belanja</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $jumlah_modal = 0;

                                foreach ($pembelian as $key) :
                                    $jumlah_modal += $key->harga_total;
                                    // $selisih_modal = $key->modal_investasi - $key->harga_total; // Corrected calculation

                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $key->id_transaksi; ?></td>
                                        <td><?= $key->periode; ?></td>
                                        <td><?= $key->investor; ?></td>
                                        <td><?= format_rupiah($key->modal_investasi); ?></td>
                                        <td><?= $key->jumlah_item; ?></td>
                                        <td><?= $key->tanggal_transaksi; ?></td>
                                        <!-- <td><?= format_rupiah($selisih_modal); ?></td> Display the calculated difference -->
                                        <td><?= format_rupiah($key->harga_total); ?></td>
                                        <td>
                                            <a href="#" class="btn btn-info edit-btn text-white" data-bs-toggle="modal" data-bs-target="#modalDetailPembelian<?= $key->id_transaksi; ?>">Detail</a>
                                            <a href="#" class="btn btn-danger edit-btn text-white" data-bs-toggle="modal" data-bs-target="#hapusData<?= $key->id_transaksi; ?>">Hapus</a>
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

<div class="modal fade" id="modalTambahPembelian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modalTambahPembelianTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahPembelianTitle">Tambah Data Pembelian Barang/Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="input-form">
                        <div id="product_row1" class="row">
                            <div class="col-md-12">
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <select class="form-control" id="investor" name="investor" onchange="updatePeriodeOptions()">
                                            <option disabled selected="selected"> - Pilih Investor - </option>
                                            <?php foreach ($investor as $key) : ?>
                                                <option value="<?php echo $key->investor; ?>" data-periodes="<?php echo $key->periodes; ?>" data-jumlah-modal="<?php echo $key->jumlah_modal; ?>"><?php echo $key->investor; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" id="periode" name="periode">
                                            <option disabled selected="selected"> - Pilih Periode - </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input id="jumlah_modal" type="text" class="form-control" value="" placeholder="Modal Investasi" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <input id="modalInvestasi" type="hidden" class="form-control" value="" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" id="nama_item1" name="nama_item1">
                                            <option disabled selected="selected"> - Pilih Item/Barang - </option>
                                            <?php foreach ($barang as $key) : ?>
                                                <option value="<?php echo $key->nama_barang; ?>"><?php echo $key->nama_barang; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" id="satuan1" name="satuan1">
                                            <option disabled selected="selected"> - Pilih Satuan - </option>
                                            <option value="box">Box</option>
                                            <option value="sak">Sak</option>
                                            <option value="pcs">Pcs</option>
                                        </select>
                                    </div>

                                    <div class="col-md-1">
                                        <input id="jumlah_item1" type="number" class="form-control" placeholder="Qty" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input id="harga_satuan1" type="number" class="form-control" placeholder="Harga Satuan" required>
                                    </div>
                                    <div class="col-md-2">
                                        <input id="harga_total1" type="number" class="form-control" placeholder="Harga Total" readonly>
                                    </div>
                                    <div id="btnHapus" class="col-md-1 d-flex align-items-center justify-content-center">
                                        <button onclick="delete_row('1')" type="button" class="btn btn-danger btn-sm" disabled><i class="bi bi-trash-fill"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button onclick="add_more()" class="btn btn-primary text-white">Tambah Barang/Item</button>
                <button onclick="submit_form()" class="btn btn-info text-white">Simpan Data</button>
            </div>
        </div>
    </div>
</div>
<?php if (empty($pembelian)) : ?>
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
    <?php foreach ($detail as $key) : ?>
        <div class="modal fade" id="modalDetailPembelian<?= $key->id_transaksi; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDetailPembelian<?= $key->id_transaksi; ?>Label" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailPembelian<?= $key->id_transaksi; ?>Label">Detail Belanja hasil investasi <br> <?= $key->investor; ?> periode <?= $key->periode; ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="QA_section">
                                    <div class="QA_table ">
                                        <table class="table" id="tabelDetailPembelian">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NO.</th>
                                                    <th scope="col">Nama Sparepart</th>
                                                    <th scope="col">Qty</th>
                                                    <th scope="col">Harga Satuan</th>
                                                    <th scope="col">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                        $no = 1;
                                                        foreach ($key->details as $detailItem) : ?>
                                                    <tr>
                                                        <td class="align-middle"><?= $no++; ?></td>
                                                        <td class="align-middle"><?= $detailItem->nama_item; ?></td>
                                                        <td class="align-middle"><?= $detailItem->jumlah_item; ?></td>
                                                        <td class="align-middle"><?= format_rupiah($detailItem->harga_satuan); ?></td>
                                                        <td class="align-middle"><?= format_rupiah($detailItem->harga_total); ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th></th>
                                                    <th colspan="3">Total Transaksi</th>
                                                    <th><?= format_rupiah($key->total_grand_total); ?></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('belanja/cetakPDF/') . $key->id_transaksi; ?>" class="btn btn-info btn-sm text-white">Cetak PDF</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php foreach ($pembelian as $key) : ?>
    <div class="modal fade" id="hapusData<?= $key->id_transaksi; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusData<?= $key->id_transaksi; ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusData<?= $key->id_transaksi; ?>Label">Peringatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?= base_url(); ?>belanja/hapus_data/<?= $key->id_transaksi; ?>">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data transaksi <?= $key->id_transaksi; ?> ini? </p>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ya, Hapus!</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    var counter = 1;

    function add_more() {
        if (validateInputs()) {
            counter++;
            var newDiv = `
            <div id="product_row${counter}" class="row">
                <div class="col-md-4 mt-1">
                    <select class="form-control" id="nama_item${counter}" name="nama_item${counter}">
                        <option disabled selected="selected"> - Pilih Item/Barang - </option>
                        <?php foreach ($barang as $key) : ?>
                            <option value="<?php echo $key->nama_barang; ?>"><?php echo $key->nama_barang; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2 mt-1">
                    <select class="form-control" id="satuan${counter}" name="satuan${counter}">
                        <option disabled selected="selected"> - Pilih Satuan - </option>
                        <option value="box">Box</option>
                        <option value="sak">Sak</option>
                        <option value="pcs">Pcs</option>
                    </select>
                </div>
                <div class="col-md-1 mt-1">
                    <input id="jumlah_item${counter}" type="number" class="form-control" placeholder="Qty" oninput="calculate_total(${counter})" required>
                </div>
                <div class="col-md-2 mt-1">
                    <input id="harga_satuan${counter}" type="number" class="form-control" placeholder="Harga Satuan" oninput="calculate_total(${counter})"  required>
                </div>
                <div class="col-md-2 mt-1">
                    <input id="harga_total${counter}" type="number" class="form-control" placeholder="Harga Total" readonly>
                </div>
                <div class="col-md-1 mt-1 col-md-1 d-flex align-items-center justify-content-center">
                    <button onclick="delete_row('${counter}')" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                </div>
            </div>`;

            var form = document.getElementById('input-form');
            var lastChild = form.lastElementChild;
            form.insertBefore(parseHTML(newDiv), lastChild.nextSibling);
        }
    }

    function parseHTML(html) {
        var t = document.createElement('template');
        t.innerHTML = html;
        return t.content.cloneNode(true);
    }

    function delete_row(id) {
        document.getElementById('product_row' + id).remove();
    }

    function calculate_total(id) {
        var jumlah_item = document.getElementById('jumlah_item' + id).value;
        var harga_satuan = document.getElementById('harga_satuan' + id).value;
        var harga_total = jumlah_item * harga_satuan;
        document.getElementById('harga_total' + id).value = harga_total;
    }

    function validateInputs() {
        for (var i = 1; i <= counter; i++) {
            var nama_item = document.getElementById('nama_item' + i);
            var investor = document.getElementById('investor');
            var periode = document.getElementById('periode');
            var modalInvestasi = document.getElementById('modalInvestasi');
            var jumlah_item = document.getElementById('jumlah_item' + i);
            var satuan = document.getElementById('satuan' + i);
            var harga_satuan = document.getElementById('harga_satuan' + i);

            if (nama_item && investor && periode && modalInvestasi && jumlah_item && harga_satuan) {
                var nama_item = nama_item.value;
                var investor = investor.value;
                var periode = periode.value;
                var modalInvestasi = modalInvestasi.value;
                var jumlah_item = jumlah_item.value;
                var satuan = satuan.value;
                var harga_satuan = harga_satuan.value;

                if (nama_item === '' || investor === '' || periode === '' || modalInvestasi === '' || jumlah_item === '' || harga_satuan === '' || satuan === '') {
                    alert('Silakan isi semua data sebelum menambahkan baris baru!.');
                    return false;
                }
            } else {
                console.error('Element not found for row ' + i);
            }
        }
        return true;
    }

    document.addEventListener('DOMContentLoaded', function() {
        for (var i = 1; i <= counter; i++) {
            addEventListeners(i);
        }
    });

    function addEventListeners(id) {
        var jumlahItemInput = document.getElementById('jumlah_item' + id);
        var hargaSatuanInput = document.getElementById('harga_satuan' + id);

        jumlahItemInput.addEventListener('input', function() {
            calculate_total(id);
        });

        hargaSatuanInput.addEventListener('input', function() {
            calculate_total(id);
        });
    }

    function submit_form() {
        if (validateInputs()) {
            var productData = [];
            for (var i = 1; i <= counter; i++) {
                var product_row = document.getElementById('product_row' + i);
                if (product_row) {
                    var nama_item = document.getElementById('nama_item' + i).value;
                    var investor = document.getElementById('investor').value;
                    var periode = document.getElementById('periode').value;
                    var modalInvestasi = document.getElementById('modalInvestasi').value;
                    var jumlah_item = document.getElementById('jumlah_item' + i).value;
                    var satuan = document.getElementById('satuan' + i).value;
                    var harga_satuan = document.getElementById('harga_satuan' + i).value;
                    var harga_total = document.getElementById('harga_total' + i).value;
                    var data = {
                        nama_item: nama_item,
                        investor: investor,
                        periode: periode,
                        modalInvestasi: modalInvestasi,
                        jumlah_item: jumlah_item,
                        satuan: satuan,
                        harga_satuan: harga_satuan,
                        harga_total: harga_total
                    };
                    productData.push(data);
                }
            }

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("belanja/save_purchase"); ?>',
                data: {
                    productData: productData
                },
                success: function(response) {
                    console.log(response);

                    if (response && response.status === 'error') {
                        console.error('Failed to save data:', response.message);
                    } else {
                        window.location.reload(true);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                }
            });
        }
    }
</script>

<script>
    $(document).on("click", "#generatePDFBtn", function() {
        console.log("Button clicked!");
        window.location.href = "<?= base_url('belanja/cetakPDF'); ?>";
    });
</script>

<script>
    function formatNumber(number) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(number);
    }

    function updatePeriodeOptions() {
        var selectedInvestor = document.getElementById("investor").value;
        var periodeDropdown = document.getElementById("periode");
        var jumlahModalInput = document.getElementById("jumlah_modal");
        var modalInvestasiInput = document.getElementById("modalInvestasi");

        // Reset nilai input jumlah_modal dan modalInvestasi
        jumlahModalInput.value = "";
        modalInvestasiInput.value = "";

        // Dapatkan dan pecah data periodes dan jumlah_modal dari data-attributes
        var selectedOption = document.getElementById("investor").options[document.getElementById("investor").selectedIndex];
        var periodes = selectedOption.getAttribute('data-periodes').split(',');
        var jumlahModals = selectedOption.getAttribute('data-jumlah-modal').split(',');

        // Menghapus opsi periode yang ada
        periodeDropdown.innerHTML = '<option disabled selected="selected"> - Pilih Periode - </option>';

        // Menambahkan opsi baru
        for (var i = 0; i < periodes.length; i++) {
            var option = document.createElement("option");
            option.value = periodes[i];
            option.text = periodes[i];
            periodeDropdown.add(option);
        }

        // Tambahkan event listener untuk menampilkan jumlah_modal dan modalInvestasi saat periode diubah
        periodeDropdown.addEventListener("change", function() {
            var selectedPeriode = periodeDropdown.value;
            var index = periodes.indexOf(selectedPeriode);
            if (index !== -1) {
                var jumlahModalsArray = jumlahModals[index].split(',');
                var formattedJumlahModal = jumlahModalsArray.map(function(number) {
                    return formatNumber(parseFloat(number));
                }).join(', ');
                jumlahModalInput.value = formattedJumlahModal;

                // Tampilkan modalInvestasi tanpa format rupiah
                modalInvestasiInput.value = jumlahModals[index];
            } else {
                jumlahModalInput.value = ""; // Reset jika periode tidak ditemukan
                modalInvestasiInput.value = "";
            }
        });
    }
</script>