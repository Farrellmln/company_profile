<?php
// Query untuk mengambil data dari tabel 'abouts'
$qHome = "SELECT * FROM abouts";
$resHome = mysqli_query($connect, $qHome) or die(mysqli_error($connect));
$item = $resHome->fetch_object();

// Mengambil deskripsi lengkap dari database
$fullDescription = $item->school_description;

// Menentukan batas karakter untuk keseluruhan deskripsi agar seimbang dengan gambar
$limit = 750;

// Memotong (truncate) deskripsi jika panjangnya melebihi batas
if (strlen($fullDescription) > $limit) {
    // Memotong string dan memastikan kata tidak terpotong di tengah
    $truncatedDescription = substr($fullDescription, 0, strrpos(substr($fullDescription, 0, $limit), ' ')) . '...';
} else {
    $truncatedDescription = $fullDescription;
}
?>

<section class="light-background">
  
    <div class="container section-title" data-aos="fade-up">
        <h2>Sejarah Singkat Sekolah</h2>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 align-items-center">
            
            <div class="col-lg-5 text-center">
                <img src="/company_profile/storages/abouts/<?= $item->school_banner ?>" class="img-fluid about-img" alt="School Banner">
            </div>

            <div class="col-lg-7 content">
                <h3 class="school-name-blue"><?= $item->school_name ?></h3>
                <p><?= $truncatedDescription ?></p>
                
                <a href="../sejarah/index.php" class="btn btn-success">Baca Selengkapnya</a>
            </div>

        </div>
    </div>

</section>
<style>
    /* CSS tambahan untuk mempercantik tampilan */
    .about-img {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .about.section .container .content p {
        line-height: 1.8;
        color: #555;
    }

    .about.section .container .content h3 {
        font-weight: bold;
        margin-bottom: 20px;
    }
    
    /* Atur ulang margin untuk section agar tidak menabrak section lain */
    .about.section {
        padding: 60px 0;
        margin: 40px 0;
    }

    /* Memastikan section-title memiliki margin yang cukup */
    .section-title {
        text-align: center; /* Biar judul sama garis center */
    }

    .section-title h2 {
        margin-bottom: 20px;
        color: #333;
        position: relative;
        display: inline-block;
    }

    /* garis hijau di bawah judul */
    .section-title h2::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: #28a745;
        margin: 8px auto 0;
        border-radius: 2px;
    }
    
    /* CSS baru untuk mengubah warna teks "SMKN Tembarak" */
    .school-name-blue {
        color: #2b8852ff;
    }
</style>
