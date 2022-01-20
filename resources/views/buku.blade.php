<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Happy Wedding</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Maundy - v4.6.0
  * Template URL: https://bootstrapmade.com/maundy-free-coming-soon-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center">

      <h1>Happy Wedding</h1>
      <h2>Riedo Andy Kurniawan. S.Kom & Lusita Eka Finanda. S.Pd</h2>
      <div class="countdown d-flex justify-content-center">
        <div>
          <h3>Sabtu</h3>
          <h4>Hari</h4>
        </div> 
        <div>
          <h3>29</h3>
          <h4>Tanggal</h4>
        </div>
        <div>
          <h3>Jan</h3>
          <h4>Bulan</h4>
        </div>
        <div>
          <h3>2022</h3>
          <h4>Tahun</h4>
        </div>
      </div>

      <div class="subscribe">
        <h4>Cari Nama Tamu disini!</h4>
        <form action="{{ route('cari') }}" method="GET">
		<input type="text" class="form-control-lg" name="cari" placeholder="Cari Tamu .." value="{{ old('cari') }}">
		<input type="submit" class="btn btn-lg btn-success" value="CARI">
	    </form>
      </div>

      <div class="social-links text-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>
  </header><!-- End #header -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Daftar Tamu</h2>
          <p>Jika tamu tidak terdaftar bisa melakukan input data secara manual</p>
        </div>

        <div class="row mt-2">
          <div class="col-lg-12 col-md-6 icon-box">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kehadiran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tamus as $key=>$item)                    
                <tr>
                    <td>{{ $tamus->firstItem() + $key  }}</td>
                    <td>{{ $item->nama }}</td>
                    @if ($item->hadir == 1)
                    <td>{{ 'Sudah Hadir' }}</td>
                    @else
                    <td>{{ 'Belum Hadir' }}</td>
                    @endif
                    <td>
                        <a href="{{ route('hadirkan',Crypt::encrypt($item->id)) }}" class="btn btn-success">Hadir</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
          {{ $tamus->links() }}

          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Input Tamu</h2>
        </div>

        <div class="row">

          {{-- <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>

          </div> --}}

          <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="{{ route('tambahtamu') }}" method="POST" class="tambah-tamu">
              @csrf
              <div class="row">
                <div class="form-group col-md-8">
                  <label for="nama">Nama Tamu</label>
                  <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                {{-- <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> --}}
              <div class="text-center col-md-4 pt-4">
                  <button type="submit">Input Tamu</button>
                </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Odete Jaya Kreatif</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/maundy-free-coming-soon-bootstrap-theme/ -->
        Designed by <a href="https://www.instagram.com/misbahur_rifqi/">Misbahur Rifqi </a>
      </div>
    </div>
  </footer><!-- End #footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>