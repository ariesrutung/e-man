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
            font-size: 18px;
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
    </style>
</head>

<body>
    <div class="header-container">
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url('assets/logo/icon_new_nppg.png'); ?>" alt="Company Logo" class="logo">
            </div>
            <div class="col-md-8">
                <div class="header-text">
                    PT. NAKARANA PANGAN PERKASA GROUP
                </div>
                <div class="address-text">
                    Jalur 9 Bawah SP III, Aimasi, Prafi, Manokwari
                </div>
                <div class="contact-info">
                    Telp. 081244803652 | Email: nakarana.nppgroup@gmail.com
                </div>
            </div>
        </div>
    </div>

    <hr class="email-line">

    <h1>RENCANA ANGGARAN BIAYA (RAB) <br>
        BELANJA BIBIT AYAM KAMPUNG DAN KEPERLUANNYA <br>
        PERIODE FABRUARI 2024</h1>
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
                    <td><?= $row->satuan; ?></td>
                    <td><?= $row->harga_satuan; ?></td>
                    <td><?= $row->grand_total; ?></td>
                </tr>
            <?php endforeach; ?>
            <tr class="total-row">
                <td colspan="5"></td>
                <td><?= $total_modal; ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>