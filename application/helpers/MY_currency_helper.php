<!-- application/helpers/MY_currency_helper.php -->

<?php

if (!function_exists('format_rupiah')) {
    function format_rupiah($angka)
    {
        $rupiah = number_format($angka, 0, ',', '.');
        return 'Rp ' . $rupiah;
    }
}
