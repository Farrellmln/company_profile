<?php
// Query untuk ambil semua berita
$qBerita = "SELECT * FROM blogs ORDER BY updated_at DESC";
$resBerita = mysqli_query($connect, $qBerita) or die(mysqli_error($connect));
?>

<section id="berita" style="background: linear-gradient(135deg, #e8f5e9 0%, #b0fab0ff 100%); padding: 100px 0 60px 0;">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Berita Sekolah</h2>
        <p class="subtitle">Kegiatan & Event SMK N Tembarak</p>
        <div class="section-line"></div> <!-- garis tipis setelah subjudul -->
    </div>

    <div class="container">
        <div class="row">
            <?php while ($item = mysqli_fetch_object($resBerita)) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="berita-card">
                        <img src="/company_profile/storages/blogs/<?= $item->image ?>" 
                             alt="<?= $item->title ?>">
                        <div class="berita-content">
                            <p class="berita-date">
                                <?= date('d M Y', strtotime($item->updated_at)) ?>
                            </p>
                            <h4><?= $item->title ?></h4>
                            <a href="detail_berita.php?id=<?= $item->id ?>">Selengkapnya »</a>
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
    font-size: 2rem;
    font-weight: 700;
    color: #1a5a3a; /* tema hijau */
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

/* ===== Card Berita ===== */
.berita-card {
    background: #f9fff9;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.berita-card:hover {
    transform: translateY(-5px);
}

.berita-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.berita-content {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 15px;
    text-align: center;
}

.berita-date {
    font-size: 0.85rem;
    color: #888;
    margin-bottom: 5px;
    font-style: italic;
}

.berita-content h4 {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 10px;
    line-height: 1.4em;
    color: #1a5a3a;
}

.berita-content a {
    font-size: 0.9rem;
    color: #28a745;
    text-decoration: none;
    font-weight: 600;
}

.berita-content a:hover {
    text-decoration: underline;
}
</style>
