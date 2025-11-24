<section id="contact" class="contact section" style="background: linear-gradient(135deg, #e8f5e9 0%, #b0fab0ff 100%); padding: 140px 0 60px 0;">
  <div class="container section-title text-center" data-aos="fade-up">
    <h2>Kontak</h2>
    <p>Silahkan Hubungi Kami Jika Ada Kendala atau Apapun itu</p>
    <div class="section-line"></div>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

      <div class="col-lg-6">
        <div class="card shadow-lg rounded-4 border-0 overflow-hidden h-100 border-success" style="transition: transform 0.4s, box-shadow 0.4s;">
          <div class="ratio ratio-4x3">
            <iframe
              src="https://maps.google.com/maps?q=SMKN%20Tembarak&t=&z=15&ie=UTF8&iwloc=&output=embed"
              style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="card shadow-lg rounded-4 border-0 p-5 h-100 border-success" style="transition: transform 0.4s, box-shadow 0.4s;">
          <form action="../../actions/kontak/store.php" method="post" data-aos="fade-up" data-aos-delay="500">
            <div class="row gy-3">
              <div class="col-md-6">
                <input type="text" name="name" class="form-control form-control-lg border-success" placeholder="Nama..." required>
              </div>
              <div class="col-md-6">
                <input type="email" name="email" class="form-control form-control-lg border-success" placeholder="Email..." required>
              </div>
              <div class="col-md-12">
                <input type="text" name="telepon" class="form-control form-control-lg border-success" placeholder="Nomor Telepon..." required>
              </div>
              <div class="col-md-12">
                <input type="text" name="subjek" class="form-control form-control-lg border-success" placeholder="Subjek..." required>
              </div>
              <div class="col-md-12">
                <textarea name="message" class="form-control form-control-lg border-success" placeholder="Tambahkan Pesan..." style="height:140px;" required></textarea>
              </div>
              <div class="col-md-12 text-center mt-3">
                <button type="submit" name="tombol" value="1" class="btn btn-success btn-lg px-5">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>

<style>
  /* Section Title & Line */
  .section-title {
    text-align: center;
    margin-bottom: 50px;
    padding-top: 20px;
  }

  .section-title h2 {
    position: relative;
    display: inline-block;
    color: #2b8852;
    font-weight: 700;
    font-size: 2rem;
    margin-bottom: 8px;
  }

  .section-title h2::after {
    content: "";
    display: block;
    width: 70px;
    height: 3px;
    background-color: #28a745;
    margin: 8px auto 0;
    border-radius: 2px;
  }

  .section-title p {
    font-size: 1rem;
    color: #555;
    margin-bottom: 6px;
  }

  .section-line {
    height: 3px;
    width: 70%;
    background-color: #28a745;
    margin: 0 auto;
    border-radius: 2px;
  }

  /* Card & Form Styling */
  .card {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    border-radius: 1rem;
  }

  .card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
  }

  .form-control {
    border-radius: 0.5rem;
    transition: all 0.3s ease;
  }

  .form-control:focus {
    border-color: #28a745;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
  }

  /* Button */
  .btn-success {
    background-color: #28a745;
    border-color: #28a745;
    transition: all 0.3s ease;
  }

  .btn-success:hover {
    background-color: #2b8852;
    border-color: #2b8852;
  }

  /* Responsive Map */
  .ratio {
    border-radius: 1rem;
    overflow: hidden;
  }
</style>