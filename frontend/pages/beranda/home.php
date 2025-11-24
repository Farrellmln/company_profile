<?php
$qHome = "SELECT * FROM abouts";
$resHome = mysqli_query($connect, $qHome) or die(mysqli_error($connect));
$item = $resHome->fetch_object();

$school_name = isset($item->school_name) ? $item->school_name : '';
$school_tagline = isset($item->school_tagline) ? $item->school_tagline : '';

$youtube_video_id = 'yRSr6QrKktU';
?>

<style>
.hero.section {
  position: relative;
  overflow: hidden;
  height: 100vh;
  width: 100vw;
  display: flex;
  align-items: center;
  justify-content: center;
}

.hero-video-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: 1;
}

.hero-video-background iframe {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 177.78vh; /* 100 * (16/9) — rasio YouTube */
  height: 100vh;
  min-width: 100%;
  min-height: 56.25vw; /* 100 * (9/16) */
  transform: translate(-50%, -50%);
  object-fit: cover;
  filter: brightness(0.6);
  pointer-events: none;
}

/* Overlay untuk teks */
.hero.section::before {
  content: "";
  position: absolute;
  inset: 0;
  background: rgba(0,0,0,0.4);
  z-index: 2;
}

/* Container teks */
.hero .container {
  position: relative;
  z-index: 3;
  color: #fff;
  opacity: 0;
  animation: fadeInOut 2s ease-in-out forwards; /* total animasi 2 detik */
}

/* Animasi teks muncul dan menghilang */
@keyframes fadeInOut {
  0% {
    opacity: 0;
    transform: translateY(30px);
  }
  10% {
    opacity: 1;
    transform: translateY(0);
  }
  50% {
    opacity: 1;
    transform: translateY(0);
  }
  100% {
    opacity: 0;
    transform: translateY(100px); /* Hilang ke bawah */
  }
}

.pulsating-play-btn {
  display: none !important;
}
</style>

<main class="main">
  <section id="hero" class="hero section dark-background">
    <div class="hero-video-background">
      <iframe
        src="https://www.youtube.com/embed/<?= $youtube_video_id ?>?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&mute=1&playlist=<?= $youtube_video_id ?>"
        frameborder="0"
        allow="autoplay; encrypted-media"
        allowfullscreen
      ></iframe>
    </div>

    <div class="container d-flex flex-column align-items-center text-center">
      <h2>Selamat Datang <?= $school_name ?></h2>
      <p><?= $school_tagline ?></p>
    </div>
  </section>
</main>
