<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('format_rupiah')) {
    function format_rupiah($angka)
    {
        $rupiah = number_format($angka, 0, ',', '.');
        return 'Rp ' . $rupiah;
    }
}
