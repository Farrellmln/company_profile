<?php
// pastikan $connect sudah di-include sebelum file ini

// Default fallback
$visi_text = "Visi sekolah belum ditetapkan.";
$misi_items = ["Misi sekolah belum ditetapkan."];

// Ambil dari DB jika ada
if (isset($connect) && $connect) {
    $qVm = "SELECT visi, misi FROM visi_misi LIMIT 1";
    $resVm = @mysqli_query($connect, $qVm);
    if ($resVm && mysqli_num_rows($resVm) > 0) {
        $vm = mysqli_fetch_object($resVm);

        $visi_text = (isset($vm->visi) && $vm->visi !== null) ? (string)$vm->visi : $visi_text;
        $misi_raw  = (isset($vm->misi) && $vm->misi !== null) ? (string)$vm->misi : "1. Misi sekolah belum ditetapkan.";

        $misi_items = preg_split('/(?:\r\n|\r|\n)+/', trim($misi_raw), -1, PREG_SPLIT_NO_EMPTY);

        if (count($misi_items) === 1 && strlen($misi_raw) > 50) {
            $misi_items_dot = preg_split('/\s*\d+\.\s*/', $misi_raw, -1, PREG_SPLIT_NO_EMPTY);
            $tmp = [];
            foreach ($misi_items_dot as $mi) {
                $mi = trim($mi);
                if ($mi !== '') $tmp[] = $mi;
            }
            if (!empty($tmp)) $misi_items = $tmp;
        }

        if (empty($misi_items)) {
            $misi_items = ["Misi sekolah belum ditetapkan."];
        }
    }
}
?>

<section class="visi-misi-section light-background">
    <div class="container section-title-custom" data-aos="fade-up">
        <h2>Visi & Misi Sekolah</h2>
        <p>Tujuan dan Komitmen Sekolah</p>
        <div class="section-line"></div> <!-- garis setelah subjudul -->
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="vm-card p-4"> <!-- card transparan, padding dikurangi -->

                    <div class="visi-wrapper mb-3 text-center">
                        <h3 class="vm-title mb-2">VISI</h3> <!-- jarak lebih dekat -->
                        <div class="vm-content">
                            <p class="visi-text">
                                <?= htmlspecialchars((string)$visi_text, ENT_QUOTES, 'UTF-8') ?>
                            </p>
                        </div>
                    </div>

                    <hr class="vm-divider my-3">

                    <div class="misi-wrapper text-center">
                        <h3 class="vm-title mb-2">MISI</h3> <!-- jarak lebih dekat ke VISI -->
                        <div class="vm-content">
                            <ul class="misi-list text-start d-inline-block">
                                <?php
                                $no = 1;
                                foreach ($misi_items as $misi_raw_item) :
                                    $misi_display = preg_replace('/^\d+\.\s*/', '', trim((string)$misi_raw_item));
                                    if ($misi_display === '') continue;
                                ?>
                                <li>
                                    <span class="misi-number"><?= $no++ ?>.</span>
                                    <?= htmlspecialchars($misi_display, ENT_QUOTES, 'UTF-8') ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<style>
.section-title-custom {
    text-align: center;
    margin-bottom: 30px;
    padding-top: 60px;
}
.section-title-custom h2 {
    color: #1a5a3a;
    font-weight: 700;
    font-size: 2.2rem;
    margin-bottom: 10px; /* jarak dikurangi */
    position: relative;
    display: inline-block;
}
.section-title-custom h2::after {
    content: "";
    display: block;
    width: 60px;
    height: 4px;
    background: #28a745;
    margin: 6px auto 0; /* dikurangi jaraknya */
    border-radius: 2px;
}
.section-title-custom p {
    color: #555;
    font-size: 1rem;
    margin: 0;
    margin-bottom: 10px; /* dikurangi jarak */
}

/* garis tipis setelah subjudul */
.section-line {
    height: 2px;
    background: #28a745;
    width: 80%;
    margin: 6px auto 0; /* jarak dikurangi */
    border-radius: 1px;
}

.visi-misi-section {
    padding: 60px 0;
    margin: 0;
    background: linear-gradient(135deg, #e8f5e9 0%, #b0fab0ff 100%);
}
.vm-card {
    border-radius: 0;
    padding: 20px 10px; /* dikurangi agar lebih rapih */
    background: transparent; /* transparan */
    border: none;
    box-shadow: none; /* hilangkan shadow */
}

/* Judul VISI dan MISI */
.vm-title {
    color: #1a5a3a !important;
    font-weight: 700;
    font-size: 1.7rem;
    padding-bottom: 3px;
    text-align: center;
    width:100%;
    margin-top: 0;
    margin-bottom: 5px; /* jarak dikurangi */
}

.vm-title::after {
    content: "";
    display: block;
    width: 40px;
    height: 3px;
    background: #28a745;
    margin: 3px auto 0;
    border-radius: 2px;
}

.visi-text {
    font-size: 1rem;
    font-weight: 400;
    color: #555;
    line-height: 1.7;
    margin-bottom: 10px; /* jarak ke MISI dikurangi */
}

.vm-divider {
    border-top: 1px dashed #cccccc;
    width: 80%;
    margin: 0 auto 10px;
}

.misi-list {
    list-style: none;
    padding: 0;
    margin: 0;
    text-align: left;
}
.misi-list li {
    font-size: 1rem;
    color: #555;
    line-height: 1.7;
    margin-bottom: 12px;
    padding-left: 35px;
    position: relative;
}
.misi-number {
    font-weight: 700;
    color: #28a745;
    font-size: 1.05rem;
    position: absolute;
    left: 0;
    top: 0;
}

@media (max-width: 767.98px) {
    .vm-card { padding: 15px !important; }
}
</style>
