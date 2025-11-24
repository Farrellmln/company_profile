<?php
// Ambil data guru dari database
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
    <h2 style="color:#1a5a3a;">Guru & Staf Karyawan</h2>
    <p style="color:#145a32;">Para Guru dan Staf Karyawan Sekolah</p>
    <div class="section-line"></div> <!-- garis setelah subjudul -->
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row">
      <?php for ($i = 0; $i < $total; $i++) { ?>
        <div class="col-md-3 col-sm-6 mb-4 d-flex align-items-stretch">
          <div class="teacher-profile text-center w-100">
            <div class="teacher-photo-wrapper">
              <img src="/company_profile/storages/teachers/<?= $teachers[$i]->teachers_photo ?>"
                   alt="<?= $teachers[$i]->teachers_name ?>"
                   class="teacher-photo">
            </div>
            <h5 class="teacher-name"><?= $teachers[$i]->teachers_name ?></h5>
            <p class="teacher-text"><?= $teachers[$i]->teachers_major ?></p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<style>
.section-title {
  text-align: center;
  margin-bottom: 30px;
  margin-top: 30px;
}
.section-title h2 {
  margin-bottom: 10px;
  color: #1a5a3a; /* hijau tema */
  position: relative;
  display: inline-block;
}
.section-title h2::after {
  content: "";
  display: block;
  width: 70px;
  height: 3px;
  background: #28a745;
  margin: 6px auto 0;
  border-radius: 2px;
}
.section-title p {
  color: #145a32; /* hijau lebih gelap */
  font-size: 1rem;
  margin-bottom: 10px;
}

/* garis tipis setelah subjudul */
.section-line {
    height: 2px;
    background: #28a745;
    width: 80%;
    margin: 6px auto 0;
    border-radius: 1px;
}

.teacher-profile {
  background: #fff;
  padding: 20px 15px;
  border-radius: 15px;
  box-shadow: 0 6px 15px rgba(0,0,0,0.15);
  transition: transform 0.3s ease;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  height: 100%;
}
.teacher-profile:hover {
  transform: translateY(-6px);
}
.teacher-photo-wrapper {
  width: 140px;
  height: 140px;
  margin: 0 auto 15px auto;
  border-radius: 50%;
  overflow: hidden;
  border: 4px solid #28a745;
  box-shadow: 0 0 10px rgba(0,0,0,0.15);
}
.teacher-photo {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.teacher-name {
  font-size: 1.1rem;
  font-weight: 700;
  margin-top: 10px;
  margin-bottom: 5px;
  color: #2b8852ff;
}
.teacher-text {
  font-size: 0.9rem;
  color: #555;
  margin: 2px 0;
}
</style>
