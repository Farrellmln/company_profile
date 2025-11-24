<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
include '../../app.php'; 
include '../../middleware/role_guard.php';
global $connect; 
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
html, body {
    height: 100%;
}

.page-inner {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    gap: 20px;
}

.container {
    max-width: 1200px;
    margin-top: 80px; /* beri jarak dari navbar */
}

.card-box {
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    border: none;
    overflow: hidden;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    background-color: #1976d2;
    color: white;
    padding: 1rem 1.5rem;
    border-radius: 12px 12px 0 0;
}

.card-title {
    color: white !important;
    margin-bottom: 0;
}

.btn-primary.with-icon {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.3s ease;
}

.btn-primary.with-icon:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}

.card-body {
    background-color: #ffffff;
    overflow: visible; /* agar tabel memanjang */
}

.table-img {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
}

.small-text { font-size: 0.85em; max-width: 150px; word-wrap: break-word; }
.wrap-text { max-width: 200px; word-wrap: break-word; white-space: normal; }

#aboutTable {
    border-collapse: collapse;
    border: 2px solid #dee2e6;
}

#aboutTable th, #aboutTable td {
    border: 2px solid #dee2e6;
    vertical-align: middle;
    text-align: center;
}

thead.table-primary th {
    background-color: #ffffff !important;
    color: #1976d2 !important;
    font-size: 0.9em;
}

.btn-sm {
    border-radius: 50%;
    width: 36px;
    height: 36px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.2s ease-in-out;
}

.btn-success:hover, .btn-warning:hover, .btn-danger:hover {
    transform: scale(1.1);
}

.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_paginate {
    margin-top: 25px;
}

.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    margin: 15px 0;
}

.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label {
    color: #1976d2;
    font-weight: bold;
}

.dataTables_wrapper .dataTables_filter input {
    border-radius: 25px;
    border: 1px solid #1976d2;
    padding: 8px 16px;
    transition: all 0.3s ease;
}

.dataTables_wrapper .dataTables_filter input:focus {
    box-shadow: 0 0 8px rgba(25,118,210,0.3);
    border-color: #1976d2;
}

.dataTables_wrapper .dataTables_length select {
    border-radius: 5px;
    border: 1px solid #1976d2;
    padding: 5px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button {
    padding: 6px 12px;
    margin: 0 4px;
    border-radius: 25px;
    background-color: #e9ecef !important;
    color: #1976d2 !important;
    font-weight: 500;
    border: none !important;
    box-shadow: none !important;
    cursor: pointer;
    transition: all 0.2s;
}

.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: #1976d2 !important;
    color: white !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: #1976d2 !important;
    color: white !important;
    font-weight: 600;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    background-color: #f5f5f5 !important;
    color: #aaa !important;
    cursor: not-allowed !important;
    pointer-events: none;
}
</style>

<div class="container mx-auto">
    <div class="page-inner">
        <h1 class="mt-4" style="color:#1976d2;">Tentang Sekolah</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../dashboard/index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Halaman Tentang Sekolah</li>
        </ol>

        <div class="card w-100 card-box">
            <div class="card-header">
                <h4 class="card-title">Tabel Tentang Sekolah</h4>
                <a href="create.php" class="btn btn-primary with-icon">
                    <i class="bi bi-plus-lg"></i> Tambah
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="aboutTable" class="display table table-bordered table-hover text-center align-middle" style="width:100%">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Sekolah</th>
                                <th>Logo Sekolah</th>
                                <th>Banner Sekolah</th>
                                <th>Tagline</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Query untuk mengambil semua data dari tabel 'abouts'
                            $query = "SELECT * FROM abouts ORDER BY id DESC";
                            $result = mysqli_query($connect, $query);
                            $no = 1; // Inisialisasi nomor urut
                            
                            // Loop untuk menampilkan setiap baris data
                            while ($item = mysqli_fetch_object($result)) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td class="small-text"><?= htmlspecialchars($item->school_name) ?></td>
                                    <td>
                                        <img src="../../../storages/abouts/<?= $item->school_logo ?>" alt="Logo" class="table-img">
                                    </td>
                                    <td>
                                        <img src="../../../storages/abouts/<?= $item->school_banner ?>" alt="Banner" class="table-img">
                                    </td>
                                    <td class="small-text"><?= htmlspecialchars($item->school_tagline) ?></td>
                                    <td class="wrap-text small-text"><?= htmlspecialchars($item->alamat) ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="detail.php?id=<?= $item->id ?>" class="btn btn-sm btn-success" title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="edit.php?id=<?= $item->id ?>" class="btn btn-sm btn-warning" title="Ubah">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="../../actions/abouts/destroy.php?id=<?= $item->id ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    $('#aboutTable').DataTable({
        responsive: true,
        ordering: true,
        dom: 'lfrtip',
        language: {
            paginate: { previous: "Sebelumnya", next: "Berikutnya" },
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoEmpty: "Tidak ada data",
            zeroRecords: "Data tidak ditemukan",
            lengthMenu: "Tampilkan _MENU_ data",
            search: "Cari:"
        }
    });
});
</script>
