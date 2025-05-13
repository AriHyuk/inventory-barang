<?php
include('../../koneksi.php'); // pastikan koneksi sudah benar

function safe($conn, $value) {
    return mysqli_real_escape_string($conn, trim($value));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_item'])) {
    if (!empty($_POST['nama_barang']) && !empty($_POST['harga']) && !empty($_POST['stok'])) {
        $nama = safe($conn, $_POST['nama_barang']);
        $harga = safe($conn, $_POST['harga']);
        $stok = safe($conn, $_POST['stok']);

        $sql = "INSERT INTO tb_barang (nama_barang, harga, stok) VALUES ('$nama', $harga, $stok)";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Barang berhasil ditambahkan'); window.location.href=window.location.href;</script>";
        } else {
            echo "<script>alert('Gagal menambahkan barang: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Semua data harus diisi!');</script>";
    }

    }
?>
