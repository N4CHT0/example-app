<?php

if (!function_exists('terbilang')) {
    function terbilang($angka)
    {
        $angka = abs($angka);
        $huruf = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
        $temp = "";
        if ($angka < 12) {
            $temp = " " . $huruf[$angka];
        } else if ($angka < 20) {
            $temp = terbilang($angka - 10) . " Belas";
        } else if ($angka < 100) {
            $temp = terbilang($angka / 10) . " Puluh" . terbilang($angka % 10);
        } else if ($angka < 200) {
            $temp = " Seratus" . terbilang($angka - 100);
        } else if ($angka < 1000) {
            $temp = terbilang($angka / 100) . " Ratus" . terbilang($angka % 100);
        } else if ($angka < 2000) {
            $temp = " Seribu" . terbilang($angka - 1000);
        } else if ($angka < 1000000) {
            $temp = terbilang($angka / 1000) . " Ribu" . terbilang($angka % 1000);
        } else if ($angka < 1000000000) {
            $temp = terbilang($angka / 1000000) . " Juta" . terbilang($angka % 1000000);
        } else if ($angka < 1000000000000) {
            $temp = terbilang($angka / 1000000000) . " Milyar" . terbilang(fmod($angka, 1000000000));
        } else if ($angka < 1000000000000000) {
            $temp = terbilang($angka / 1000000000000) . " Triliun" . terbilang(fmod($angka, 1000000000000));
        }
        return $temp;
    }
}
