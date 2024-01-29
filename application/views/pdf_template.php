<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            text-align: center;
        }

        tbody td:nth-child(2) {
            text-align: left !important;
        }

        th,
        td {
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .total-row {
            font-weight: bold;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .header-text {
            font-size: 20px;
            font-weight: bold;
        }

        .address-text {
            font-size: 14px;
        }

        .contact-info {}

        .logo {
            max-width: 80px;
            max-height: 80px;
            margin-right: 20px;
        }

        .email-line {
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .header-right,
        .nama-admin {
            text-align: right;
            /* font-weight: bold;
            font-size: 16px; */
        }

        .text-bold {
            font-weight: bold;
        }

        .mt {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="header-container">
        <img src="<?= base_url('assets/logo/icon_new_nppg.png'); ?>" alt="Company Logo" class="logo">
        <div>
            <div class="header-text">
                <?= $perusahaan['nama_perseroan']; ?>
            </div>
            <div class="address-text">
                <?= $perusahaan['alamat_lengkap_perseroan']; ?>
            </div>
            <div class="contact-info">
                Telp. <?= $perusahaan['no_hp']; ?> | Email: <?= $perusahaan['email']; ?>
            </div>
        </div>
    </div>
    <hr class="email-line">

    <h4>RENCANA ANGGARAN BIAYA (RAB) <br>
        BELANJA DOC & PAKAN AYAM KAMPUNG JENIS KUB <br>
        - PERIODE FEBRUARI 2024 - </h4>
    <br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Item/Produk</th>
                <th>Jumlah Item</th>
                <th>Satuan</th>
                <th>Harga Satuan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total_modal = 0;

            foreach ($belanja as $row) :
                $total_modal += $row->grand_total;
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
                                    $satuan_text = 'Tidak Diketahui';
                                    break;
                            }
                            ?>
                            <span>
                                <?= $satuan_text; ?>
                            </span>
                    </td>
                    <td><?= format_rupiah($row->harga_satuan); ?></td>
                    <td><?= format_rupiah($row->grand_total); ?></td>
                </tr>
            <?php endforeach; ?>
            <tr class="total-row">
                <td></td>
                <td class="text-bold" colspan="4">Total Modal</td>
                <td class="text-bold"><?= format_rupiah($total_modal); ?></td>
            </tr>
        </tbody>
    </table>

    <div class="container mt-4">
        <div>
            <p class="header-right">
                Mengetahui,<br>
                Admin PT. NPP GROUP
            </p>
            <br>
            <br>
            <br>

            <div class="nama-admin">
                IGNASIUS BAGUR
            </div>

        </div>
    </div>
</body>

</html>