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

<section id="testimonials" class="testimonials section light-background" style="background: linear-gradient(135deg, #e8f5e9 0%, #b0fab0ff 100%); padding: 150px 0 60px 0;">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Testimoni</h2>
        <p>Apa Kata Mereka:</p> <!-- font biasa, titik dua default -->
        <div class="section-line"></div> <!-- garis lebih panjang -->
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <?php
                $active = "active";
                for ($i = 0; $i < $totalTestimonials; $i++) {
                ?>
                    <div class="carousel-item <?= $active ?>">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="testimonial-container">

                                    <div class="testimonial-photo-wrapper">
                                        <img src="../../../storages/testimonials/<?= $testimonials[$i]->image ?>" 
                                             class="testimonial-img-custom" 
                                             alt="<?= $testimonials[$i]->name ?>">
                                    </div>

                                    <h5 class="testimonial-name"><?= $testimonials[$i]->name ?></h5>
                                    <h6 class="testimonial-status"><?= $testimonials[$i]->status ?></h6>

                                    <div class="stars">
                                        <?php
                                        $rating = (int)$testimonials[$i]->rating;
                                        $max_rating = 5;
                                        for ($s = 1; $s <= $rating; $s++) echo '<i class="bi bi-star-fill"></i>';
                                        for ($e = $rating + 1; $e <= $max_rating; $e++) echo '<i class="bi bi-star"></i>';
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
                <?php $active = ""; } ?>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-nav-button carousel-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 16 16">
                    <path d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </button>
            <button class="carousel-nav-button carousel-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" viewBox="0 0 16 16">
                    <path d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>

            <!-- Indicators -->
            <div class="carousel-indicators-custom">
                <?php for ($k = 0; $k < $totalTestimonials; $k++) { ?>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="<?= $k ?>" class="<?= ($k == 0) ? 'active' : '' ?>"></button>
                <?php } ?>
            </div>

        </div>
    </div>
</section>

<style>
/* Section Title */
.section-title {
    text-align: center;
    margin-bottom: 50px;
}
.section-title h2 {
    color: #1a5a3a; 
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 8px;
    display: inline-block;
    position: relative;
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
    margin-bottom: 6px;
    color: #333; /* font biasa */
}

/* Garis tipis setelah subjudul */
.section-line {
    height: 2px;
    width: 70%; /* garis lebih panjang */
    background: #28a745;
    margin: 6px auto 0;
    border-radius: 1px;
}

/* Testimonial Container */
.testimonial-container {
    padding: 10px 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}
.testimonial-photo-wrapper {
    width: 120px;
    height: 120px;
    margin-bottom: 15px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid #28a745;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.testimonial-img-custom {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.testimonial-name {
    font-size: 1.2rem;
    font-weight: 700;
    color: #2b8852;
    margin: 0;
}
.testimonial-status {
    font-size: 0.9rem;
    color: #555;
    margin-bottom: 15px;
}
.stars {
    margin-bottom: 10px;
}
.stars i {
    color: gold;
    margin: 0 1px;
}
.testimonial-message {
    font-style: italic;
    color: #555;
    line-height: 1.6;
    max-width: 90%;
}
.quote-icon-left, .quote-icon-right {
    color: #b3e6c0;
    font-size: 1.2rem;
}

/* Carousel Controls */
.carousel-nav-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0,0,0,0.2);
    border: none;
    border-radius: 50%;
    width: 40px; height: 40px;
    display: flex; align-items: center; justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s;
}
#testimonialCarousel:hover .carousel-nav-button {
    opacity: 1;
    pointer-events: auto;
}
.carousel-prev { left: 0; }
.carousel-next { right: 0; }

/* Indicators */
.carousel-indicators-custom {
    position: absolute;
    bottom: -30px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 5px;
}
.carousel-indicators-custom button {
    width: 10px; height: 10px;
    border-radius: 50%;
    border: none;
    background-color: #2b8852;
    opacity: 0.5;
    transition: opacity 0.3s;
}
.carousel-indicators-custom .active {
    opacity: 1;
    background-color: #28a745;
}
</style>
