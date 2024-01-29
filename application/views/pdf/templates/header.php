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
        }

        .text-bold {
            font-weight: bold;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
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
                <?= $company['nama_perseroan']; ?>
            </div>
            <div class="address-text">
                <?= $company['alamat_lengkap_perseroan']; ?>
            </div>
            <div class="contact-info">
                Telp. <?= $company['no_hp']; ?> | Email: <?= $company['email']; ?>
            </div>
        </div>
    </div>
    <hr class="email-line">

    <h4><?= $pdf_title; ?><br>
        - <?= $periode; ?> - </h4>
    <br>