<?php
// Query untuk ambil semua jurusan
$qMajors = "SELECT * FROM majors ORDER BY majors_name ASC";
$resMajors = mysqli_query($connect, $qMajors) or die(mysqli_error($connect));
?>

<style>
    /* Section Jurusan */
    #jurusan {
        background: #ffffff;
        padding: 80px 0;
    }

    #jurusan h2 {
        font-weight: 700;
        font-size: 2rem;
        color: #2b8852;
    }

    #jurusan h2::after {
        content: "";
        display: block;
        width: 80px;
        height: 4px;
        background: #28a745;
        margin: 12px auto 0;
        border-radius: 3px;
    }

    #jurusan p.subtitle {
        text-align: center;
        margin-bottom: 50px;
        color: #555;
        font-size: 1rem;
    }

    /* Card jurusan */
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
        border: 4px solid #28a74522; /* garis tipis transparan */
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

<section id="jurusan" style="background: linear-gradient(135deg, #e8f5e9 0%, #d0fbd0 100%); padding: 100px 0 60px 0;">
    <div class="container section-title text-center" data-aos="fade-up">
        <h2>Jurusan</h2>
        <p class="subtitle">Program Keahlian Unggulan di SMK N Tembarak</p>
    </div>

    <div class="container">
        <div class="row">
            <?php while ($item = mysqli_fetch_object($resMajors)) { ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="jurusan-card">
                        <img src="/company_profile/storages/majors/<?= $item->majors_image ?>" 
                             alt="<?= $item->majors_name ?>">
                        <h4><?= $item->majors_name ?></h4>
                        <a class="jurusan-detail" href="../jurusan/detail_jurusan.php?id=<?= $item->id ?>">Detail »</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
