<?php
include('../../koneksi.php');

function safe($conn, $value) {
    return mysqli_real_escape_string($conn, trim($value));
}

// Tambah stok
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_stock'])) {
    if (!empty($_POST['id_barang']) && !empty($_POST['stok_tambah']) && !empty($_POST['id_user'])) {
        $id_barang = safe($conn, $_POST['id_barang']);
        $stok_tambah = safe($conn, $_POST['stok_tambah']);
        $id_user = safe($conn, $_POST['id_user']);

        $sql = "UPDATE tb_barang SET stok = stok + $stok_tambah WHERE id_barang = $id_barang";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Stok berhasil ditambah'); window.location.href=window.location.href;</script>";
        } else {
            echo "<script>alert('Error SQL: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Semua data harus diisi!');</script>";
    }
}

// Edit stok
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_stock'])) {
    if (!empty($_POST['id_barang']) && isset($_POST['stok_ubah'])) {
        $id_barang = safe($conn, $_POST['id_barang']);
        $stok_ubah = safe($conn, $_POST['stok_ubah']);

        $sql = "UPDATE tb_barang SET stok = $stok_ubah WHERE id_barang = $id_barang";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Stok berhasil diubah'); window.location.href=window.location.href;</script>";
        } else {
            echo "<script>alert('Error SQL: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Semua data harus diisi!');</script>";
    }
}

// Ambil data barang
$sql = "SELECT * FROM tb_barang";
$query = mysqli_query($conn, $sql);
?>

<!-- HTML View -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Stok Barang</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Stok Barang</h3>
                    <button class="btn btn-dark float-right" data-toggle="modal" data-target="#addItemModal">Tambah Barang</button>

                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($result = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?= $result['id_barang'] ?></td>
                                    <td><?= $result['nama_barang'] ?></td>
                                    <td><?= $result['harga'] ?></td>
                                    <td><?= $result['stok'] ?></td>
                                    <td>
                                        <button class="btn btn-warning edit-btn" data-id="<?= $result['id_barang'] ?>" data-stok="<?= $result['stok'] ?>" data-toggle="modal" data-target="#editModal">Edit Stok</button>
                                        <button class="btn btn-success add-btn" data-id="<?= $result['id_barang'] ?>" data-toggle="modal" data-target="#addStockModal">Tambah Stok</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah Barang Baru -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" action="barang_tambah.php"> <!-- atau ditangani langsung di file yang sama -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Barang Baru</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stok Awal</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_item" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Modal Tambah Stok -->
<div class="modal fade" id="addStockModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Stok</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_barang" id="add_id_barang">
                    <div class="form-group">
                        <label>Jumlah Tambah</label>
                        <input type="number" name="stok_tambah" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>ID User</label>
                        <input type="number" name="id_user" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_stock" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Stok -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Stok</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_barang" id="edit_id_barang">
                    <div class="form-group">
                        <label>Stok Baru</label>
                        <input type="number" name="stok_ubah" id="edit_stok_ubah" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="edit_stock" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- SCRIPT: Isi Modal Otomatis -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    
    // Untuk isi otomatis modal Tambah
    $('.add-btn').on('click', function () {
        var id_barang = $(this).data('id');
        $('#add_id_barang').val(id_barang);
    });

    // Untuk isi otomatis modal Edit
    $('.edit-btn').on('click', function () {
        var id_barang = $(this).data('id');
        var stok = $(this).data('stok');
        $('#edit_id_barang').val(id_barang);
        $('#edit_stok_ubah').val(stok);
    });
</script>

<!-- DataTables (jika diperlukan) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
!-- DataTables & Button Export -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap4.min.css">

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables Button Export -->
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function () {
        var table1 = $('#example1').DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            dom: 'Bfrtip',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
        });

        table1.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
