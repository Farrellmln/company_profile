<?php
// Ambil data galeri dari database
$qGallery = "SELECT * FROM galleries ORDER BY date DESC";
$resGallery = mysqli_query($connect, $qGallery) or die(mysqli_error($connect));

$galleries = [];
while ($row = $resGallery->fetch_object()) {
  $galleries[] = $row;
}
$totalGallery = count($galleries);
?>

<section id="gallery" class="gallery section light-background" style="background: linear-gradient(135deg, #e8f5e9 0%, #b0fab0ff 100%); padding: 100px 0 60px 0;">
  <div class="container section-title" data-aos="fade-up">
    <h2>Galeri</h2>
    <p>Galeri from SMKN Tembarak</p>
    <div class="section-line"></div> <!-- garis panjang -->
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <?php for ($i = 0; $i < $totalGallery; $i++) { ?>
        <div class="col-lg-4 col-md-6 mb-4 d-flex align-items-stretch"> <!-- 3 kolom per row -->
          <div class="gallery-card w-100">
            <div class="gallery-photo-wrapper">
              <img src="/company_profile/storages/galleries/<?= $galleries[$i]->image ?>"
                   alt="Gallery Image"
                   class="gallery-photo">
            </div>
            <div class="gallery-info">
              <div class="gallery-meta">
                <span class="gallery-date"><?= date("d M Y", strtotime($galleries[$i]->date)) ?></span> | 
                <span class="gallery-author"><?= htmlspecialchars($galleries[$i]->author) ?></span>
              </div>
              <p class="gallery-description">
                <?= htmlspecialchars($galleries[$i]->description) ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<style>
.gallery-card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 6px 15px rgba(0,0,0,0.1);
  overflow: hidden;
  transition: transform 0.3s ease;
  display: flex;
  flex-direction: column;
}
.gallery-card:hover {
  transform: translateY(-6px);
}
.gallery-photo-wrapper {
  width: 100%;
  height: 220px;
  overflow: hidden;
}
.gallery-photo {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}
.gallery-info {
  padding: 15px;
  flex: 1;
}
.gallery-meta {
  font-size: 0.85rem;
  color: #777;
  margin-bottom: 8px;
}
.gallery-author {
  font-weight: 600;
  color: #2b8852ff;
}
.gallery-description {
  font-size: 0.95rem;
  color: #444;
  line-height: 1.6;
  margin: 0;
}
.section-title {
  text-align: center;
  margin-bottom: 30px;
  margin-top: 30px;
}
.section-title h2 {
  margin-bottom: 8px;
  color: #333;
  position: relative;
  display: inline-block;
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
/* Garis panjang setelah subjudul */
.section-line {
  height: 2px;
  width: 70%; /* bisa diubah sesuai panjang yang diinginkan */
  background: #28a745;
  margin: 6px auto 0;
  border-radius: 1px;
}
</style>
