<?php
// Sambutan Kepala Sekolah - halaman sendiri

// Ambil data kepala sekolah
$qheadmaster = "SELECT * FROM headmasters LIMIT 1";
$resheadmaster = mysqli_query($connect, $qheadmaster) or die(mysqli_error($connect));
$item = mysqli_fetch_assoc($resheadmaster);

$headmasterImage = !empty($item['headmaster_image']) 
    ? "/company_profile/storages/headmasters/" . $item['headmaster_image'] 
    : "/company_profile/storages/headmasters/default.jpg";

$headmasterName = !empty($item['headmaster_name']) ? $item['headmaster_name'] : "Kepala Sekolah";
$headmasterDescription = !empty($item['headmaster_description']) ? $item['headmaster_description'] : "Deskripsi sambutan kepala sekolah belum tersedia.";
?>

<section id="sambutan" class="sambutan-section">
  <div class="container">
    <div class="section-header text-center" data-aos="fade-up">
      <h2>Sambutan Kepala Sekolah</h2>
      <p class="intro-text">Kepala Sekolah SMKN Tembarak <?= htmlspecialchars($headmasterName) ?></p>
      <div class="intro-line"></div>
    </div>

    <div class="row align-items-center content-wrapper" data-aos="fade-up" data-aos-delay="100">
      <!-- Foto Kepala Sekolah -->
      <div class="col-md-4 text-center mb-4 mb-md-0">
        <div class="headmaster-card">
          <img src="<?= $headmasterImage ?>" 
               alt="Kepala Sekolah" 
               class="headmaster-img mb-3">
          <h5 class="headmaster-name"><?= htmlspecialchars($headmasterName) ?></h5>
        </div>
      </div>

      <!-- Deskripsi Sambutan -->
      <div class="col-md-8">
        <div class="headmaster-description">
          <p>
            <?= nl2br(htmlspecialchars($headmasterDescription)) ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
/* ============================= */
/* Section Styling */
/* ============================= */
.sambutan-section {
    padding: 120px 0 70px 0; 
    background: linear-gradient(135deg, #eaf8f0 0%, #d2f5d2 100%);
    scroll-margin-top: 100px;
}

/* ============================= */
/* Section Header */
/* ============================= */
.section-header {
    text-align: center;
    margin-bottom: 50px;
}
.section-header h2 {
    font-size: 2.3rem;
    font-weight: 700;
    color: #1b5e20;
    margin-bottom: 15px;
    position: relative;
}
.section-header h2::after {
    content: "";
    display: block;
    width: 70px;
    height: 4px;
    margin: 10px auto 0;
    background: #43a047;
    border-radius: 2px;
}
.section-header .intro-text {
    font-size: 1rem;
    color: #145a32; 
    margin-top: 10px;
}
.section-header .intro-line {
    height: 2px;
    background: #43a047; /* garis hijau tipis */
    margin: 10px auto 0;
    width: 80%; /* panjang garis */
    border-radius: 1px;
}

/* ============================= */
/* Card Foto Kepala Sekolah */
/* ============================= */
.headmaster-card {
    background: transparent;
    padding: 0;
    border-radius: 0;
}
.headmaster-img {
    width: 100%;
    max-height: 380px;
    object-fit: cover;
    border-radius: 15px;
    box-shadow: 0 6px 15px rgba(67,160,71,0.3); /* efek shadow lembut */
}
.headmaster-name {
    font-size: 1.2rem;
    font-weight: 600;
    color: #0d3d0d;
    margin-top: 10px;
}

/* ============================= */
/* Deskripsi Sambutan */
/* ============================= */
.headmaster-description {
    background: transparent; 
    color: #0d3d0d;
    font-size: 1rem;
    line-height: 1.8;
    text-align: justify;
    padding: 0;
}
.headmaster-description p {
    margin-bottom: 0;
}

/* ============================= */
/* Responsive Adjustments */
/* ============================= */
@media (max-width: 991.98px) {
    .headmaster-description {
        margin-top: 20px;
    }
}
</style>
