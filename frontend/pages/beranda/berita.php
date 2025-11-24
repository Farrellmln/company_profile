<?php
// Query untuk ambil 3 berita terbaru
$qBerita = "SELECT * FROM blogs ORDER BY updated_at DESC LIMIT 3";
$resBerita = mysqli_query($connect, $qBerita) or die(mysqli_error($connect));
?>

<style>
    /* Section Berita */
    #berita {
        background: #f9f9f9;
        padding: 60px 0;
    }

    #berita h2::after {
    content: "";
    display: block;
    width: 60px;              /* panjang garis */
    height: 3px;              /* tebal garis */
    background: #28a745;      /* warna hijau */
    margin: 8px auto 0;       /* auto = biar selalu di tengah */
    border-radius: 2px;       /* biar ujungnya sedikit rounded */
    }

    #berita p.subtitle {
        text-align: center;
        margin-bottom: 40px;
        color: #666;
    }

    /* Card berita */
    .berita-card {
        background: #fff;
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
        height: 200px; /* semua gambar fix tinggi */
        object-fit: cover;
    }

    .berita-content {
        flex: 1; /* isi konten fleksibel */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 15px;
        text-align: center;
    }

    /* Bagian atas (tanggal + judul) */
    .berita-top {
        flex-shrink: 0;
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
    }

    /* Tombol selalu di bawah */
    .berita-bottom {
        margin-top: auto;
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

    /* Tombol lihat berita lainnya */
    .btn-berita {
        display: block;
        margin: 30px auto 0 auto;
        padding: 10px 25px;
        background: #28a745;
        color: #fff;
        font-weight: 600;
        border-radius: 25px;
        text-decoration: none;
        transition: background 0.3s ease;
        text-align: center;
        width: fit-content;
    }

    .btn-berita:hover {
        background: #218838;
        color: #fff;
    }
</style>

<section id="berita" class="light-background">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Berita Sekolah</h2>
         <p class="subtitle">Kegiatan & Event SMK N Tembarak</p>
    </div>

    <div class="container">

        <div class="row">
            <?php while ($item = mysqli_fetch_object($resBerita)) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="berita-card">
                        <img src="/company_profile/storages/blogs/<?= $item->image ?>" 
                             alt="<?= $item->title ?>">
                        <div class="berita-content">
                            <div class="berita-top">
                                <!-- Tanggal update -->
                                <p class="berita-date">
                                    <?= date('d M Y', strtotime($item->updated_at)) ?>
                                </p>
                                <!-- Judul -->
                                <h4><?= $item->title ?></h4>
                            </div>
                            <div class="berita-bottom">
                                <!-- Link -->
                                <a href="../berita/detail_berita.php?id=<?= $item->id ?>">Selengkapnya »</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Tombol lihat berita lainnya -->
        <a href="../berita/index.php" class="btn-berita">Lihat Berita Lainnya</a>
    </div>
</section>
