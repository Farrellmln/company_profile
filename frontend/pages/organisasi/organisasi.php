<?php
// Ambil data organisasi
$qOrganizations = "SELECT * FROM extracurriculars";
$resOrganizations = mysqli_query($connect, $qOrganizations) or die(mysqli_error($connect));

// Masukkan data organisasi ke array
$organizations = [];
while ($row = $resOrganizations->fetch_object()) {
    $organizations[] = $row;
}
$total_org = count($organizations);
?>

<section class="section light-background" style="padding: 100px 0 60px 0; background: linear-gradient(135deg, #e8f5e9 0%, #b0fab0ff 100%);">
  <div class="container section-title text-center" data-aos="fade-up">
    <h2 style="color:#1a5a3a;">Organisasi & Kegiatan Ekstrakurikuler</h2>
    <p style="color:#145a32; margin-bottom:15px;">Bergabunglah dan kembangkan minat serta bakat Anda di berbagai organisasi sekolah kami!</p>
    <div class="section-line"></div> <!-- garis setelah subjudul -->
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row g-3 justify-content-center align-items-stretch">
      <?php for ($i = 0; $i < $total_org; $i++) { ?>
        <div class="col-lg-4 col-md-6 d-flex">
          <div class="org-card w-100 h-100 d-flex flex-column">
            <div class="org-image-container">
              <img src="/company_profile/storages/extracurriculars/<?= $organizations[$i]->image ?>" 
                   alt="<?= $organizations[$i]->name ?>" 
                   class="org-image">
            </div>
            <div class="org-content flex-grow-1 d-flex flex-column justify-content-between">
              <div>
                <h4 class="org-name"><?= $organizations[$i]->name ?></h4>
                <div class="org-coach">Pembina: <span><?= $organizations[$i]->coach ?></span></div>
              </div>
              <p class="org-description"><?= $organizations[$i]->description ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<style>
.section-title {
    padding-top: 50px;
    margin-bottom: 40px;
}

.section-title h2 {
    font-size: 32px;
    font-weight: 700;
    display: inline-block;
    position: relative;
    color: #1a5a3a; /* warna hijau tema */
}

.section-title h2::after {
    content: "";
    display: block;
    width: 70px;
    height: 3px;
    background: #28a745;
    margin: 8px auto 0;
    border-radius: 2px;
}

.section-title p {
    font-size: 1rem;
    margin-bottom: 10px;
    color: #145a32; /* hijau gelap */
}

/* garis tipis setelah subjudul */
.section-line {
    height: 2px;
    background: #28a745;
    width: 80%;
    margin: 6px auto 0;
    border-radius: 1px;
}

.org-card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    padding: 15px;
    height: 100%;
}

.org-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.org-image-container {
    height: 150px;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
}

.org-image {
    width: auto;
    height: 100%;
    object-fit: contain;
    transition: transform 0.4s ease;
}

.org-card:hover .org-image {
    transform: scale(1.05);
}

.org-content {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    justify-content: space-between;
}

.org-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2b8852;
    margin-top: 0;
    margin-bottom: 5px;
    text-align: center;
}

.org-coach {
    font-size: 0.9rem;
    color: #333;
    margin-bottom: 5px;
    font-weight: 600;
    text-align: left;
}

.org-description {
    font-size: 0.95rem;
    color: #555;
    margin-bottom: 0;
    text-align: justify;
}
</style>
