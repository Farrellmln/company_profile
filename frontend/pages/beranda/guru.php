<?php
// Ambil data guru
$qTeachers = "SELECT * FROM teachers";
$resTeachers = mysqli_query($connect, $qTeachers) or die(mysqli_error($connect));

$teachers = [];
while ($row = $resTeachers->fetch_object()) {
  $teachers[] = $row;
}
$total = count($teachers);
?>

<section id="teachers" class="teachers section light-background" style="background: linear-gradient(135deg, #e8f5e9 0%, #b0fab0ff 100%); padding: 100px 0 60px 0;">
  <div class="container section-title" data-aos="fade-up">
    <h2>Guru & Tenaga Pengajar</h2>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div id="teacherCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-inner">

        <?php
        $active = "active";
        for ($i = 0; $i < $total; $i += 4) {
        ?>
          <div class="carousel-item <?= $active ?>">
            <div class="row justify-content-center">
              <?php for ($j = $i; $j < $i + 4 && $j < $total; $j++) { ?>
                <div class="col-md-3 col-sm-6 mb-4">
                  <div class="teacher-profile text-center">
                    <div class="teacher-photo-wrapper">
                      <img src="/company_profile/storages/teachers/<?= $teachers[$j]->teachers_photo ?>"
                           alt="<?= $teachers[$j]->teachers_name ?>"
                           class="teacher-photo">
                    </div>
                    <h5 class="teacher-name"><?= $teachers[$j]->teachers_name ?></h5>
                    <div class="teacher-info-content">
                      <p class="teacher-text"><?= $teachers[$j]->jk ?></p>
                      <p class="teacher-text"><?= $teachers[$j]->teachers_major ?></p>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        <?php
          $active = "";
        }
        ?>

      </div>

      <!-- Tombol navigasi custom (SVG + hanya tampil saat hover) -->
      <button class="carousel-nav-button carousel-prev" type="button" data-bs-target="#teacherCarousel" data-bs-slide="prev" aria-label="Previous slide">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 16 16">
          <path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
        </svg>
      </button>
      <button class="carousel-nav-button carousel-next" type="button" data-bs-target="#teacherCarousel" data-bs-slide="next" aria-label="Next slide">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 16 16">
          <path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
        </svg>
      </button>
    </div>
  </div>
</section>

<style>
.teacher-profile {
  background: #fff;
  padding: 25px 20px;
  border-radius: 15px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  transition: all 0.4s ease;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.teacher-profile:hover {
  transform: translateY(-8px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}
.teacher-photo-wrapper {
  width: 140px;
  height: 140px;
  margin-bottom: 20px;
  border-radius: 50%;
  overflow: hidden;
  border: 4px solid #00c291;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.teacher-photo {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.teacher-name {
  font-size: 1.1rem;
  font-weight: 700;
  margin-bottom: 10px;
  color: #2b8852ff;
  min-height: 2.2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}
.teacher-info-content {
  min-height: 4.5rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 4px;
}
.teacher-text {
  font-size: 0.9rem;
  color: #555;
  margin: 0;
  text-align: center;
}
.section-title {
  text-align: center;
  margin-bottom: 30px;
}
.section-title h2 {
  margin-bottom: 20px;
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

/* Tombol carousel custom (SVG + muncul saat hover) */
#teacherCarousel {
  position: relative;
}
.carousel-nav-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0.2);
  color: white;
  border: none;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  text-align: center;
  z-index: 10;
  transition: background-color 0.3s, opacity 0.3s;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  pointer-events: none;
  cursor: pointer;
}

#teacherCarousel:hover .carousel-nav-button {
  opacity: 1;
  pointer-events: auto;
}

.carousel-nav-button:hover {
  background-color: rgba(0, 0, 0, 0.5);
}

.carousel-prev {
  left: -20px;
}

.carousel-next {
  right: -20px;
}

/* Hilangkan panah default Bootstrap */
.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: none;
}
</style>
