<?php
// --- NOTIFIKASI PESAN ---
$unreadCount = 0;
$latestMessages = [];

if (isset($connect)) {
    // Ambil 5 pesan terbaru
    $queryMessages = "SELECT id, name, subjek, is_read, created_at 
                      FROM message 
                      ORDER BY created_at DESC 
                      LIMIT 5";
    $resultMessages = mysqli_query($connect, $queryMessages);

    if ($resultMessages) {
        // Hitung jumlah pesan belum dibaca
        $queryUnreadCount = "SELECT COUNT(*) AS unread_count FROM message WHERE is_read = 0";
        $resultUnreadCount = mysqli_query($connect, $queryUnreadCount);
        $dataUnreadCount = mysqli_fetch_assoc($resultUnreadCount);
        $unreadCount = $dataUnreadCount['unread_count'];

        while ($row = mysqli_fetch_assoc($resultMessages)) {
            $latestMessages[] = $row;
        }
    }
}

// --- PROFIL USER ---
$userName = htmlspecialchars($_SESSION['name'] ?? 'Pengguna');
$profileImage = ''; 
$role = $_SESSION['role'] ?? '';
?>

<div class="body-wrapper d-flex flex-column min-vh-100" style="background-color: #e5e5e5;">
    <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item d-block d-xl-none">
                    <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                    </a>
                </li>

                <?php if ($role !== 'staf'): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="#" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ti ti-message-2"></i>
                        <?php if ($unreadCount > 0): ?>
                            <div class="notification bg-danger rounded-circle"></div>
                        <?php endif; ?>
                    </a>

                    <div class="dropdown-menu dropdown-menu-start dropdown-menu-animate-up" 
                         aria-labelledby="notificationDropdown" 
                         style="min-width: 320px; max-height: 420px; overflow-y: auto; border: 1px solid #ddd; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                        
                        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
                            <h6 class="mb-0 fw-semibold">Pesan Terbaru (<?= $unreadCount ?> Belum Dibaca)</h6>
                            <a href="../message/index.php" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                        </div>

                        <div class="list-group list-group-flush">
                            <?php if (count($latestMessages) > 0): ?>
                                <?php foreach ($latestMessages as $msg): ?>
                                    <?php 
                                        $isUnread = ($msg['is_read'] == 0);
                                        $statusClass = $isUnread ? 'bg-light fw-bold' : '';
                                    ?>
                                    <a href="../message/detail.php?id=<?= $msg['id'] ?>" 
                                       class="list-group-item list-group-item-action <?= $statusClass ?> p-3 border-bottom message-item" 
                                       data-id="<?= $msg['id'] ?>">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1 text-dark text-truncate" style="max-width: 80%;">
                                                <?= htmlspecialchars($msg['name']) ?>
                                            </h6>
                                            <small class="text-muted">
                                                <?= date('H:i', strtotime($msg['created_at'])) ?>
                                            </small>
                                        </div>
                                        <p class="mb-1 fs-3 text-truncate"><?= htmlspecialchars($msg['subjek']) ?></p>
                                        <?php if ($isUnread): ?>
                                            <small class="text-danger">Baru</small>
                                        <?php endif; ?>
                                    </a>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p class="text-center text-muted py-3 mb-0">Tidak ada pesan baru.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
                <?php endif; ?>
            </ul>

            <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-info d-none d-sm-block me-3">
                                    <span class="text-dark fw-bold fs-4" style="font-family: 'Poppins', sans-serif;">
                                        Hi, <?= $userName ?>
                                    </span>
                                </div>
                                <div class="profile-avatar">
                                    <?php if ($profileImage) : ?>
                                        <img src="<?= $profileImage ?>" alt="profile" class="rounded-circle" width="40" height="40">
                                    <?php else : ?>
                                        <div class="avatar-placeholder rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px; font-size: 1.5rem;">
                                            <i class="ti ti-user"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" 
                             aria-labelledby="drop2" 
                             style="border: 1px solid #ddd; box-shadow: 0 4px 12px rgba(0,0,0,0.15); min-width: 200px;">
                            <div class="message-body">
                                <div class="d-flex align-items-center gap-3 px-3 pt-3 pb-2">
                                    <div class="avatar-placeholder rounded-circle bg-primary text-white d-flex align-items-center justify-content-center flex-shrink-0" 
                                         style="width: 45px; height: 45px; font-size: 1.8rem;">
                                        <i class="ti ti-user"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-bold text-dark fs-4 text-truncate"><?= $userName ?></p>
                                        <p class="mb-0 text-muted fs-3 text-truncate">
                                            <?= htmlspecialchars($_SESSION['email'] ?? 'email@contoh.com') ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="dropdown-divider my-2"></div>
                                <a href="../auth/logout.php" 
                                   class="btn btn-danger mx-3 mt-1 mb-3 d-block d-flex align-items-center justify-content-center fw-semibold">
                                    <i class="ti ti-logout me-2"></i> Logout
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const messageItems = document.querySelectorAll('.message-item');
        
        messageItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault(); 
                const messageId = this.getAttribute('data-id');
                const link = this.getAttribute('href');

                fetch('../../actions/message/mark_read.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'id=' + messageId
                })
                .then(() => window.location.href = link)
                .catch(() => window.location.href = link);
            });
        });
    });
    </script>
