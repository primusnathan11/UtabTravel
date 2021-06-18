<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utab Travel Homepage</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">

    <script src="<?php echo base_url() ?>assets/js/main.js"></script>

    <script src="https://kit.fontawesome.com/d87ebeff25.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
</head>

<body>

	<?php if($this->session->userdata('level')=='Admin'){ ?>
		<nav class="navbar navbar-expand-lg navbar-default">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand" href="#">Utab Travel</a>
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()?>Order/order_admin">Pemesanan</a>
        </li>
      </ul>

			<ul class="topnav-right">
			<li class="nav-item dropdown ml-auto">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								<?php if($this->session->userdata('logged_in') == TRUE){?>
										<a class="dropdown-item" href="<?php echo base_url()?>Profile/index"><?php echo$this->session->userdata('nama_user')?></a>
                    <a class="dropdown-item" href="<?php echo base_url()?>Login/logout">Logout</a>

								<?php } 
 							  else { 
								?>
								<a class="dropdown-item" href="<?php echo base_url()?>Login">Login</a>
								<?php } ?>
                </div>
      </li>
			</ul>
    
    </div>
  </nav>
	<?php }else{?>
		<nav class="navbar navbar-expand-lg navbar-default">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <img src="<?php echo base_url('assets/images/logo2.png')?>" alt="" style="width:150px;height:50px; box-shadow:none;">
  
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url()?>Home/index">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Our Services
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url()?>Places/hotels">Hotels</a>
            <a class="dropdown-item" href="<?php echo base_url()?>Places/destination">Tourist Destinations</a>
			<a class="dropdown-item" href="<?php echo base_url()?>Places/culinary">Culinary</a>
          </div>
        </li>
      </ul>

			<ul class="topnav-right">
			<li class="nav-item dropdown ml-auto">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-user"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								<?php if($this->session->userdata('logged_in') == TRUE){?>
										<a class="dropdown-item" href="<?php echo base_url()?>Profile/index"><?php echo$this->session->userdata('nama_user')?></a>
										<a class="dropdown-item" href="<?php echo base_url()?>Order/order_list">Pesanan Anda</a>
                    <a class="dropdown-item" href="<?php echo base_url()?>Login/logout">Logout</a>

								<?php } 
 							  else { 
								?>
								<a class="dropdown-item" href="<?php echo base_url()?>Login">Login</a>
								<?php } ?>
                </div>
      </li>
			</ul>
    
    </div>
  </nav>
	<?php } ?>
<div class="main-content">
<?php $this->load->view($content);?>
</div>

<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Utab Travel adalah website yang menyediakan informasi tempat wisata di kota Batu, Jawa Timur. Tidak hanya tempat wisata, kami juga
						menyediakan informasi mengenai tempat penginapan terbaik di kota Batu dan kuliner terbaik yang ada di Kota Batu.</p>
          </div>



          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="<?php echo base_url()?>Home/index">Home</a></li>
							<li><a href="<?php echo base_url()?>Places/hotels">Tempat Penginapan</a></li>
							<li><a href="<?php echo base_url()?>Places/destination">Destinasi Wisata</a></li>
							<li><a href="<?php echo base_url()?>Places/culinary">Kuliner</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
         <a href="#">Utab Travel</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="dribbble" href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
</footer>
</body>
</html>
<script>
  $(function () {
    $(document).scroll(function () {
        var $nav = $(".navbar-default");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
      });
  });
</script>
