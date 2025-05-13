<?php
include dirname(__DIR__, 2) . '/koneksi.php';

// Ambil data dari form
$id_masuk       = $_POST['id_masuk'] ?? '';
$id_barang      = trim($_POST['id_barang'] ?? '');
$tanggal_masuk  = $_POST['tanggal_masuk'] ?? '';
$tgl_exp        = $_POST['tgl_exp'] ?? null; // Bisa kosong jika bukan makanan/kosmetik
$id_supplier    = $_POST['id_supplier'] ?? '';
$subtotal       = $_POST['subtotal'] ?? '';
$kode_masuk     = $_POST['kode_masuk'] ?? '';
$id_user        = $_POST['id_user'] ?? '';

// Debug output (bisa dihapus di production)
echo "Debug:<br>";
echo "id_masuk: $id_masuk<br>";
echo "id_barang: $id_barang<br>";
echo "tanggal_masuk: $tanggal_masuk<br>";
echo "tgl_exp: " . ($tgl_exp ?: 'NULL') . "<br>";
echo "id_supplier: $id_supplier<br>";
echo "subtotal: $subtotal<br>";
echo "kode_masuk: $kode_masuk<br>";
echo "id_user: $id_user<br>";

// Validasi wajib isi
if (
    empty($id_masuk) || empty($id_barang) || empty($tanggal_masuk) ||
    empty($id_supplier) || empty($subtotal) || empty($kode_masuk) || empty($id_user)
) {
    die("❌ Gagal simpan: Mohon lengkapi semua data yang wajib diisi.");
}

// Validasi foreign key id_barang
$cek_barang = mysqli_query($conn, "SELECT id_barang FROM tb_barang WHERE id_barang = '$id_barang'");
if (mysqli_num_rows($cek_barang) === 0) {
    die("❌ Gagal simpan: Barang dengan ID $id_barang tidak ditemukan di tb_barang.");
}

// Bangun query INSERT
$sql = "INSERT INTO barang_masuk (
            id_masuk, id_barang, tanggal_masuk, tgl_exp,
            id_supplier, subtotal, kode_masuk, id_user
        ) VALUES (
            '$id_masuk', '$id_barang', '$tanggal_masuk', " . 
            ($tgl_exp ? "'$tgl_exp'" : "NULL") . ", 
            '$id_supplier', '$subtotal', '$kode_masuk', '$id_user'
        )";

// Debug query SQL (optional, bisa dihapus di production)
echo "<br><strong>SQL Query:</strong><br><pre>$sql</pre><br>";

// Eksekusi query
$query = mysqli_query($conn, $sql);

// Cek hasil
if ($query) {
    header("Location: ?page=form-barang&success=true");
    exit;
} else {
    echo "❌ Gagal simpan data: " . mysqli_error($conn);
}
?>
