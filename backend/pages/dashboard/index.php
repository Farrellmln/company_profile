<?php
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
include '../../app.php';

// --- KODE PHP: MENGAMBIL DATA JENIS KELAMIN GURU DARI DATABASE ---
$query_male = "SELECT COUNT(*) as total_male FROM teachers WHERE jk = 'Laki-laki'";
$result_male = mysqli_query($connect, $query_male);
$total_male = ($result_male && mysqli_num_rows($result_male) > 0) ? mysqli_fetch_assoc($result_male)['total_male'] : 0;

$query_female = "SELECT COUNT(*) as total_female FROM teachers WHERE jk = 'Perempuan'";
$result_female = mysqli_query($connect, $query_female);
$total_female = ($result_female && mysqli_num_rows($result_female) > 0) ? mysqli_fetch_assoc($result_female)['total_female'] : 0;

$total_guru = $total_male + $total_female;

// --- KODE PHP: MENGAMBIL DATA JUMLAH ORGANISASI DARI DATABASE ---
$query_organisasi = "SELECT COUNT(*) as total_organisasi FROM extracurriculars";
$result_organisasi = mysqli_query($connect, $query_organisasi);
$total_organisasi = ($result_organisasi && mysqli_num_rows($result_organisasi) > 0) ? mysqli_fetch_assoc($result_organisasi)['total_organisasi'] : 0;

// --- KODE PHP: MENGAMBIL DATA JUMLAH PRESTASI DARI DATABASE ---
$query_prestasi = "SELECT COUNT(*) as total_prestasi FROM achievements";
$result_prestasi = mysqli_query($connect, $query_prestasi);
$total_prestasi = ($result_prestasi && mysqli_num_rows($result_prestasi) > 0) ? mysqli_fetch_assoc($result_prestasi)['total_prestasi'] : 0;

// --- KODE PHP: MENGAMBIL DATA LOG AKTIVITAS ---
$query_activity = "
    SELECT 
        ua.created_at, 
        ua.activity,
        ua.ip_address,
        ua.user_agent,
        u.name,
        u.role 
    FROM 
        user_activities ua
    JOIN 
        users u ON ua.user_id = u.id
    WHERE 
        ua.activity IN ('login', 'logout')
    ORDER BY 
        ua.created_at DESC 
    LIMIT 10";

$result_activity = mysqli_query($connect, $query_activity);
$num_rows_activity = $result_activity ? mysqli_num_rows($result_activity) : 0;
$no_activity = 1;
?>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<div class="page-wrapper py-4 px-5">
    <div class="page-inner" style="padding: 20px; margin-top: 60px;">

        <!-- ROW 1: STATISTIK -->
        <div class="row mb-4">
            <!-- CARD GURU -->
            <div class="col-lg-4 d-flex align-items-strech">
                <div class="card w-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold">Breakdown Jenis Kelamin Guru</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3">Total: <?= $total_guru ?> Guru</h4>
                                <div class="d-flex align-items-center mt-4">
                                    <span class="me-2 rounded-circle bg-info round-20 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-users text-white"></i>
                                    </span>
                                    <p class="fs-3 mb-0">Total seluruh staf pengajar aktif.</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div id="breakup-jk"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD ORGANISASI -->
            <div class="col-lg-4 d-flex align-items-strech">
                <div class="card w-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold">Total Organisasi Sekolah</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3"><?= $total_organisasi ?> Organisasi</h4>
                                <div class="d-flex align-items-center mt-4">
                                    <span class="me-2 rounded-circle bg-success round-20 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-check text-white"></i>
                                    </span>
                                    <p class="fs-3 mb-0">Jumlah ekstrakurikuler/organisasi aktif.</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div id="breakup-organisasi"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD PRESTASI -->
            <div class="col-lg-4 d-flex align-items-strech">
                <div class="card w-100 shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-9 fw-semibold">Total Prestasi Sekolah</h5>
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="fw-semibold mb-3"><?= $total_prestasi ?> Prestasi</h4>
                                <div class="d-flex align-items-center mt-4">
                                    <span class="me-2 rounded-circle bg-warning round-20 d-flex align-items-center justify-content-center">
                                        <i class="ti ti-trophy text-white"></i>
                                    </span>
                                    <p class="fs-3 mb-0">Jumlah total pencapaian yang diraih.</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div id="breakup-prestasi"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BAGIAN PESAN & LOG HANYA UNTUK ADMIN -->
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <!-- ROW 2: PESAN TERBARU -->
            <div class="row mb-4">
                <div class="col-lg-12 d-flex align-items-strech">
                    <div class="card w-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title fw-semibold">Pesan Terbaru</h5>
                                <a href="../message/index.php" class="btn btn-primary btn-sm">Lihat Semua</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle mb-0 fs-6">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Subjek</th>
                                            <th>Tanggal</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM message ORDER BY id DESC LIMIT 5";
                                        $result = mysqli_query($connect, $query);
                                        $no = 1;

                                        if ($result && mysqli_num_rows($result) > 0) :
                                            while ($msg = mysqli_fetch_object($result)) :
                                        ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td style="font-size: 0.8rem;"><?= htmlspecialchars($msg->name) ?></td>
                                                    <td style="font-size: 0.8rem;"><?= htmlspecialchars($msg->email) ?></td>
                                                    <td style="font-size: 0.8rem;"><?= htmlspecialchars($msg->subjek) ?></td>
                                                    <td style="font-size: 0.75rem;"><?= date('d-m-Y H:i', strtotime($msg->created_at)) ?></td>
                                                    <td class="text-center align-middle">
                                                        <a href="../message/detail.php?id=<?= $msg->id ?>"
                                                            class="btn btn-sm btn-outline-info d-flex align-items-center justify-content-center mx-auto"
                                                            style="width: 35px; height: 35px; border-radius: 6px;">
                                                            <i class="ti ti-eye"></i>
                                                        </a>
                                                    </td>

                                                </tr>
                                            <?php endwhile;
                                        else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center text-muted py-4">Tidak ada pesan terbaru.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ROW 3: LOG AKTIVITAS -->
            <div class="row">
                <div class="col-lg-12 d-flex align-items-strech">
                    <div class="card w-100 shadow-sm border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title fw-semibold">Log Aktivitas Pengguna (Login & Logout)</h5>
                                <a href="../user_activities/index.php" class="btn btn-primary btn-sm">Lihat Semua</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle mb-0 fs-6">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Pengguna</th>
                                            <th>Peran</th>
                                            <th>Aktivitas</th>
                                            <th>Waktu</th>
                                            <th>IP Address</th>
                                            <th>User Agent</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($num_rows_activity > 0): while ($log = mysqli_fetch_object($result_activity)): ?>
                                                <tr>
                                                    <td><?= $no_activity++ ?></td>
                                                    <td style="font-size: 0.8rem;"><?= htmlspecialchars($log->name) ?></td>
                                                    <td style="font-size: 0.8rem;"><?= ucfirst(htmlspecialchars($log->role)) ?></td>
                                                    <td><span class="badge <?= $log->activity == 'login' ? 'bg-success' : 'bg-danger' ?>"><?= ucfirst($log->activity) ?></span></td>
                                                    <td style="font-size: 0.8rem;"><?= date('d-m-Y H:i', strtotime($log->created_at)) ?></td>
                                                    <td style="font-size: 0.8rem;"><?= htmlspecialchars($log->ip_address) ?></td>
                                                    <td style="font-size: 0.75rem;"><?= htmlspecialchars(substr($log->user_agent, 0, 50)) ?><?= strlen($log->user_agent) > 50 ? '...' : '' ?></td>
                                                </tr>
                                            <?php endwhile;
                                        else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-4">Tidak ada log aktivitas login/logout.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?> <!-- END IF ADMIN -->

        <?php
        include '../../partials/script.php';
        include '../../partials/footer.php';
        ?>

        <script>
            const maleCount = <?= $total_male ?>;
            const femaleCount = <?= $total_female ?>;
            const totalOrganisasi = <?= $total_organisasi ?>;
            const totalPrestasi = <?= $total_prestasi ?>;

            function renderChart(id, series, colors) {
                if (!document.querySelector(id)) return;
                new ApexCharts(document.querySelector(id), {
                    chart: {
                        type: 'donut',
                        height: 100,
                        width: '100%'
                    },
                    series,
                    colors,
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: false
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%'
                            }
                        }
                    },
                }).render();
            }

            renderChart("#breakup-jk", [maleCount, femaleCount], ['#1976d2', '#ff69b4']);
            renderChart("#breakup-organisasi", [totalOrganisasi, 0], ['#28a745', '#f8f9fa']);
            renderChart("#breakup-prestasi", [totalPrestasi, 0], ['#ffc107', '#f8f9fa']);
        </script>
    </div>
</div>