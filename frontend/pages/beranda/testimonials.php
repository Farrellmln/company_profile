<?php
// Query untuk mengambil semua data dari tabel 'testimonials'
$qTestimonials = "SELECT * FROM testimonials";
$resTestimonials = mysqli_query($connect, $qTestimonials) or die(mysqli_error($connect));

$testimonials = [];
while ($row = $resTestimonials->fetch_object()) {
    $testimonials[] = $row;
}
$totalTestimonials = count($testimonials);
?>

<section id="testimonials" class="testimonials section light-background" style="background: linear-gradient(135deg, #e8f5e9 0%, #b0fab0ff 100%); padding: 100px 0 60px 0;">
    <div class="container section-title" data-aos="fade-up">
        <h2>Testimoni</h2>
        <p>Apa Kata Mereka</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">

                <?php
                $active = "active";
                // Loop untuk menampilkan setiap testimoni sebagai slide individu
                for ($i = 0; $i < $totalTestimonials; $i++) {
                ?>
                    <div class="carousel-item <?= $active ?>">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-container text-center">
                                    
                                    <div class="testimonial-photo-wrapper">
                                        <img src="../../../storages/testimonials/<?= $testimonials[$i]->image ?>" 
                                             class="testimonial-img-custom" 
                                             alt="<?= $testimonials[$i]->name ?>">
                                    </div>
                                    
                                    
                                    
                                    <h5 class="testimonial-name"><?= $testimonials[$i]->name ?></h5>
                                    <h6 class="testimonial-status"><?= $testimonials[$i]->status ?></h6>

                                    <div class="stars">
                                        <?php
                                        $rating = (int)$testimonials[$i]->rating; // Ambil nilai rating (misal: 4)
                                        $max_rating = 5;
                                        
                                        // Loop untuk bintang terisi (berdasarkan rating)
                                        for ($s = 1; $s <= $rating; $s++) {
                                            echo '<i class="bi bi-star-fill"></i>';
                                        }
                                        
                                        // Loop untuk bintang kosong (sisanya hingga 5)
                                        for ($e = $rating + 1; $e <= $max_rating; $e++) {
                                            echo '<i class="bi bi-star"></i>'; // Menggunakan ikon bintang kosong (bi bi-star)
                                        }
                                        ?>
                                    </div>
                                    
                                    <p class="testimonial-message">
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span><?= $testimonials[$i]->message ?></span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    $active = ""; 
                }
                ?>

            </div>

            <button class="carousel-nav-button carousel-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev" aria-label="Previous slide">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 16 16">
                    <path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </button>
            <button class="carousel-nav-button carousel-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next" aria-label="Next slide">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 16 16">
                    <path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
            
            <div class="carousel-indicators-custom">
                <?php for ($k = 0; $k < $totalTestimonials; $k++) { ?>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="<?= $k ?>" class="<?= ($k == 0) ? 'active' : '' ?>" aria-current="<?= ($k == 0) ? 'true' : 'false' ?>" aria-label="Slide <?= $k + 1 ?>"></button>
                <?php } ?>
            </div>

        </div>
    </div>
</section>

<style>
/* HAPUS CARD: Ganti testimonial-item-custom menjadi testimonial-container tanpa styling card */
.testimonial-container {
  /* Hapus background putih, padding, box-shadow */
  padding: 10px 0; /* Padding tipis agar tidak terlalu rapat */
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* Membuat Foto Testimoni Menjadi Lingkaran */
.testimonial-photo-wrapper {
  width: 120px;
  height: 120px;
  margin-bottom: 15px; /* Kurangi margin */
  border-radius: 50%;
  overflow: hidden;
  border: 4px solid #00c291; /* Border hijau */
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

.testimonial-img-custom {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

/* Styling Bintang (Pindahkan ke atas nama) */
.testimonial-container .stars {
    margin-bottom: 8px;
}
.testimonial-container .stars i {
  color: gold;
  margin: 0 1px;
}

.testimonial-name {
  font-size: 1.2rem;
  font-weight: 700;
  margin: 0;
  color: #2b8852ff;
}

.testimonial-status {
  font-size: 0.9rem;
  color: #777;
  margin-bottom: 20px; /* Tambahkan margin agar pesan ada jarak */
  font-weight: 400;
}

/* PESAN/DESKRIPSI DI BAWAH SENDIRI */
.testimonial-message {
  font-style: italic;
  margin: 0 0 20px 0;
  color: #555;
  line-height: 1.6;
  max-width: 90%; /* Agar pesan tidak terlalu lebar */
}

.testimonial-message span {
  padding: 0 10px;
}

.quote-icon-left, .quote-icon-right {
  color: #b3e6c0; 
  font-size: 1.4rem;
}

/* Styling Section Title (Diadopsi dari bagian Guru) */
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

/* Styling Carousel Navigasi Kustom (Tetap sama) */
#testimonialCarousel {
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

#testimonialCarousel:hover .carousel-nav-button {
  opacity: 1;
  pointer-events: auto;
}

.carousel-nav-button:hover {
  background-color: rgba(0, 0, 0, 0.5);
}

.carousel-prev {
  left: 0px; 
}

.carousel-next {
  right: 0px; 
}

/* Styling Indicator/Bullet Kustom (Tetap sama) */
.carousel-indicators-custom {
    position: absolute;
    right: 0;
    bottom: -40px; 
    left: 0;
    z-index: 15;
    display: flex;
    justify-content: center;
    padding: 0;
    list-style: none;
}

.carousel-indicators-custom button {
    box-sizing: content-box;
    flex: 0 1 auto;
    width: 10px; 
    height: 10px; 
    padding: 0;
    margin-right: 3px;
    margin-left: 3px;
    text-indent: -999px;
    cursor: pointer;
    background-color: #2b8852ff; 
    background-clip: padding-box;
    border: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    opacity: .5;
    transition: opacity .6s ease;
    border-radius: 50%;
}

.carousel-indicators-custom .active {
    opacity: 1;
    background-color: #00c291; 
}

/* Sembunyikan panah default Bootstrap jika masih muncul */
.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: none;
}
</style>