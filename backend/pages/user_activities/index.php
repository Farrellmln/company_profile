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
    margin-top: 80px;
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
    overflow: visible;
}

.small-text { font-size: 0.85em; max-width: 150px; word-wrap: break-word; }
.wrap-text { max-width: 200px; word-wrap: break-word; white-space: normal; }

#activityTable {
    border-collapse: collapse;
    border: 2px solid #dee2e6;
}

#activityTable th, #activityTable td {
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
        <h1 class="mt-4" style="color:#1976d2;">Log Aktivitas Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../dashboard/index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Log Aktivitas Pengguna</li>
        </ol>

        <div class="card w-100 card-box">
            <div class="card-header">
                <h4 class="card-title">Riwayat Aktivitas Pengguna</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="activityTable" class="display table table-bordered table-hover text-center align-middle" style="width:100%">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>Email</th>
                                <th>Aktivitas</th>
                                <th>IP Address</th>
                                <th>Waktu Login</th>
                                <th>Waktu Logout</th>
                                <th>Dibuat</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "
                                SELECT 
                                    ua.*, 
                                    u.name AS user_name, 
                                    u.email AS user_email 
                                FROM user_activities ua
                                LEFT JOIN users u ON ua.user_id = u.id
                                ORDER BY ua.created_at DESC
                            ";
                            $result = mysqli_query($connect, $query);
                            $no = 1;

                            while ($log = mysqli_fetch_object($result)) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td class="small-text"><?= htmlspecialchars($log->user_name ?? '-') ?></td>
                                    <td class="small-text"><?= htmlspecialchars($log->user_email ?? '-') ?></td>
                                    <td class="small-text">
                                        <?php if ($log->activity === 'login'): ?>
                                            <span class="badge bg-success text-white px-3 py-1">Login</span>
                                        <?php elseif ($log->activity === 'logout'): ?>
                                            <span class="badge bg-danger text-white px-3 py-1">Logout</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary text-white px-3 py-1"><?= htmlspecialchars($log->activity) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="small-text"><?= htmlspecialchars($log->ip_address ?? '-') ?></td>
                                    <td><?= !empty($log->login_at) ? date('d-m-Y H:i:s', strtotime($log->login_at)) : '-' ?></td>
                                    <td><?= !empty($log->logout_at) ? date('d-m-Y H:i:s', strtotime($log->logout_at)) : '-' ?></td>
                                    <td><?= !empty($log->created_at) ? date('d-m-Y H:i:s', strtotime($log->created_at)) : '-' ?></td>
                                    <td class="small-text"><?= htmlspecialchars($log->description ?? '-') ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="detail.php?id=<?= $log->id ?>" class="btn btn-sm btn-success" title="Detail">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="../../actions/user_activities/destroy.php?id=<?= $log->id ?>" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus log ini?')">
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
    $('#activityTable').DataTable({
        responsive: true,
        ordering: true,
        dom: 'lfrtip',
        order: [[7, 'desc']], // urut berdasarkan 'Dibuat'
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
