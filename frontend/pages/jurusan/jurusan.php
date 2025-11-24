<?php
// Query untuk ambil semua jurusan
$qMajors = "SELECT * FROM majors ORDER BY majors_name ASC";
$resMajors = mysqli_query($connect, $qMajors) or die(mysqli_error($connect));
?>

<section id="jurusan" style="background: linear-gradient(135deg, #e8f5e9 0%, #d0fbd0 100%); padding: 100px 0 60px 0;">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Jurusan</h2>
        <p class="subtitle">Program Keahlian Unggulan di SMK N Tembarak</p>
        <div class="section-line"></div> <!-- garis setelah subjudul -->
    </div>

    <div class="container">
        <div class="row">
            <?php while ($item = mysqli_fetch_object($resMajors)) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="jurusan-card">
                        <img src="/company_profile/storages/majors/<?= $item->majors_image ?>" 
                             alt="<?= $item->majors_name ?>">
                        <h4><?= $item->majors_name ?></h4>
                        <a class="jurusan-detail" href="detail_jurusan.php?id=<?= $item->id ?>">Detail »</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<style>
/* ===== Section title ===== */
.section-title {
    padding-top: 50px;
    margin-bottom: 40px;
}

.section-title h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #1a5a3a; /* hijau tema */
    margin-bottom: 10px;
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

.section-title p.subtitle {
    font-size: 1rem;
    color: #145a32; /* hijau gelap */
    margin-bottom: 8px;
}

/* garis tipis setelah subjudul */
.section-line {
    height: 2px;
    width: 80%;
    background: #28a745;
    margin: 6px auto 0;
    border-radius: 1px;
}

/* ===== Card Jurusan ===== */
.jurusan-card {
    background: #f9fff9;
    border-radius: 15px;
    padding: 25px 20px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.12);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    height: 100%;
}

.jurusan-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.jurusan-card img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    margin: 0 auto 15px auto;
    border: 4px solid #28a74522;
}

.jurusan-card h4 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #2b8852;
    margin-bottom: 12px;
}

.jurusan-detail {
    font-size: 0.9rem;
    font-weight: 600;
    color: #28a745;
    text-decoration: none;
    border-bottom: 2px solid #28a745;
    padding-bottom: 2px;
    transition: color 0.3s ease, border-color 0.3s ease;
}

.jurusan-detail:hover {
    color: #1e7e34;
    border-color: #1e7e34;
}
</style>
