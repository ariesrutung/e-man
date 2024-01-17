<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('tanggal_indonesia')) {
    function tanggal_indonesia($tanggal, $format = 'j F Y')
    {
        $bulan = array(
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        );

        $tanggal_php = strtotime($tanggal);
        $tanggal_formatted = date('j', $tanggal_php) . ' ' . $bulan[date('n', $tanggal_php) - 1] . ' ' . date('Y', $tanggal_php);

        return $tanggal_formatted;
    }
}
