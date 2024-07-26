<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Beranda</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Contrail+One|Raleway" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
  <link rel="shortcut icon" href="asset/img/img-local/favicon.ico">
  <link rel="stylesheet" href="asset/css/style-index1.css">
  <link rel="stylesheet" href="asset/css/style-index2.css">

  <script src="asset/js/preloader.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      $(".preloader").fadeOut();
    })
  </script>

</head>

<body>

  <!--Pre Loader-->
  <div class="preloader">
    <div class="loading">
      <img src="asset/img/img-local/spiner.gif" width="80">
    </div>
  </div>


  <!--Navbar-->
  <header>
    <a href="#" id=""></a>
    <nav>
      <a href="#" id="menu-icon"></a>
      <ul id="top-menu">
        <li style="list-style: none; display: inline"></li>
        <li class="active">
          <a href="#">Beranda</a>
        </li>
        <li style="list-style: none; display: inline"></li>
        <li>
          <a href="#foo">Petunjuk</a>
        </li>
        <li style="list-style: none; display: inline"></li>
        <li>
          <a href="#bar">Lokasi</a>
        </li>
        <li style="list-style: none; display: inline"></li>
      </ul>
    </nav>
  </header>

  <!-- konten1 -->
  <div class="page-wrap">
    <div class="header">
      <div class="box-1">
        <h1 disabled>TrashCan!</h1>
        <p> Berlangganan Pengambilan Sampah </p>
        <br> <br>

        <div class="center">
          <a href="login.php">
            <div class="btn" align="center">Login</div>
          </a> <!-- End Btn -->

          <a href="registrasi.php">
            <div id="btn2" align="center">Register</div>
          </a> <!-- End Btn2 -->
        </div>
      </div>
    </div>
  </div>
  </div>


  <!--konten2-->
  <div id="foo">
    <section class="team">
      <div class="container">
        <div class="row">
          <br>
          <h1>TERTARIK BERGABUNG ?</h1><br>
          <p>TrashCan adalah perusahaan berbasis penyedian jasa pengambilan sampah. Anda bisa memesan jasa pengambilan sampah-sampah bekas rumah tangga atau barang barang yang sudah tidak terpakai dirumah anda kepada kami.</p>
        </div>
        <div class="row mgt50px">
          <div class="coloumn">
            <div class="imgBox">
              <img src="asset/img/img-content/1.jpg">
            </div>
            <div class="details">
              <h3>#Tahap1<br><span>Lakukan Pendaftaran</span></h3>
            </div>
          </div>
          <div class="coloumn">
            <div class="imgBox">
              <img src="asset/img/img-content/2.jpg">
            </div>
            <div class="details">
              <h3>#Tahap2<br><span>Pemilahan Sampah</span></h3>
            </div>
          </div>
          <div class="coloumn">
            <div class="imgBox">
              <img src="asset/img/img-content/3.jpg">
            </div>
            <div class="details">
              <h3>#Tahap3<br><span>Penimbangan Sampah</span></h3>
            </div>
          </div>
          <div class="coloumn">
            <div class="imgBox">
              <img src="asset/img/img-content/4.jpg">
            </div>
            <div class="details">
              <h3>#Tahap4<br><span>Pembayaran</span></h3>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="asset/js/index.js"></script>

  <!--konten maps-->

  <div id="bar">
    <div class="row mgt50px">
      <h1 align="center">Lokasi TrashCan</h1>
      <br>
      <br>
      <center>
        <iframe src="https://www.google.com/maps/d/embed?mid=1GND7xYBO2jrb6XZjj56h8Dd-FyE&ehbc=2E312F" width="640" height="480"></iframe>
      </center>

      <br>
    </div>

  </div>

  <!--footer-->
  <footer class="footer-distributed">

    <div class="footer-left">

      <a href="#" id="logo_f"></a>
      <br>

      <p class="footer-links">
      <ul>
        <a href="#">Beranda</a>
        ·
        <a href="#foo">Petunjuk</a>
        ·
        <a href="#bar">Lokasi</a>
        </p>

        <p class="footer-company-name">&copy; TrashCan | Deny Agung Prasetyo </p>
    </div>

    <div class="footer-center">

      <div>
        <i class="fa fa-map-marker"></i>
        <p><span>Bantulan, Bantul</span> Yogyakarta, DIY.</p>
      </div>

      <div>
        <i class="fa fa-phone"></i>
        <p><a href="sms:(+62)899999999">(+62)822-6542-0404</a></p>
      </div>

      <div>
        <i class="fa fa-envelope"></i>
        <p><a href="mailto:trashcan@gmail.com">trashcan@gmail.com</a></p>
      </div>

    </div>

    <div class="footer-right">

      <p class="footer-company-about">
        <span>Kunjungi Sosial Media Kami!</span>
        Untuk yang ingin lebih dekat dengan TrashCan, silahkan kunjungi sosial media kami dibawah ini!
      </p>

      <div class="footer-icons">

        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>

      </div>

    </div>

  </footer>

</body>

</html>