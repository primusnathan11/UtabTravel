<?php $url_place = $this->uri->segment(3); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utab Travel Homepage</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">

    <link href="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css" rel="stylesheet">

    <script src="https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js"></script>

    <script src="<?php echo base_url()?>assets/js/main.js"></script>

    <script src="https://kit.fontawesome.com/d87ebeff25.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

  
   
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-default scrolled">
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

<div class="container">
    <div class="row" style="padding-top:100px;">
        <div class="col-md-6 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Checkout</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
			<?php foreach($cart as $data) : ?>
				<form action="<?=base_url('Order/pemesanan/'.$url_place)?>" method="POST">

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0"><?php echo $data->nama_place ?></h6>
												<input type="hidden" name="nama_place" id="" value="<?php echo $data->nama_place?>">
                        <small class="text-muted"><?php echo $data->alamat_place?></small>
                    </div>
                    <span class="text-muted">
											Qty
										<input type="number" value="1" style="width:40px; border:none;" min="1" id="qty" name="qty">
										<input type="hidden" value="<?php echo $data->harga ?>" id="price">
										</span>
                </li>
               
							 <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Total</h6>
                    </div>
                    <span class="text-muted">
											Rp.
										<input type="number" value="<?php echo $data->harga ?>" style="border:none; width: 72px" min="1" id="total" readonly name="total_harga">
										</span>
                </li>
                
            </ul>
        </div>
				
        <div class="col-md-6 order-md-1">
            <h4 class="mb-3">Data diri</h4>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Nama</label>
                        <input type="text" class="form-control" id="nama_user" placeholder="" value="<?php echo $this->session->userdata('nama_user')?>" name="nama_user">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email_user" value="<?php echo $this->session->userdata('email_user')?>" name="email_user">
                </div>

								<div class="mb-3">
                    <label for="email">No telepon</label>
                    <input type="text" class="form-control" id="no_telp" value="<?php echo $this->session->userdata('no_telp')?>" name="no_telp">
                </div>
                
                <hr class="mb-4">

                <h4 class="mb-3">Metode pembayaran</h4>
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
												<input id="debit" name="payment" type="radio" class="custom-control-input" required="" value="BCA">
                        <label class="custom-control-label" for="debit">BCA - 0111924101</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="payment" type="radio" class="custom-control-input" required="" value="Mandiri">
                        <label class="custom-control-label" for="debit">Mandiri - 14400921</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="payment" type="radio" class="custom-control-input" required="" value="BNI">
                        <label class="custom-control-label" for="paypal">BNI - 1300295302</label>
                    </div>
                </div>
                
                <button class="btn btn-primary btn-lg btn-block" type="submit">Lanjutkan pembayaran</button>
								</form>
								<?php endforeach;?>
        </div>
    </div>
    
</div>

</body>
</html>

<script>
	$("#qty").change(function () {
   								 $("#total").val($(this).val() * $('#price').val());
								});

(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())
</script>
