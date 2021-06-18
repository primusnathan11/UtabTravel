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

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css" integrity="sha512-okE4owXD0kfXzgVXBzCDIiSSlpXn3tJbNodngsTnIYPJWjuYhtJ+qMoc0+WUwLHeOwns0wm57Ka903FqQKM1sA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
   
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

<script>
$(document).ready(function() {
    $("#slider").slider({
        min: 0,
        max: 1000000,
        step: 1,
        values: [10000, 500000],
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $("input.sliderValue[data-index=" + i + "]").val(ui.values[i]);
            }
        }
    });

    $("input.sliderValue").change(function() {
        var $this = $(this);
        $("#slider").slider("values", $this.data("index"), $this.val());
    });
});
</script>


<div class="container">

  <!--Section: Best Features-->


    <div class="row">

    </div>

      <!--Section: Hotel-->
      <section id="product-offer" style="margin-top:100px;">
        <h1  class="text-center">Our Destination offer</h1>
        <p class="text-center">Find the best tourist destination here in Batu.</p>
    
		<form action="<?php echo base_url('Places/search_place')?>" method="POST">
		<div class="text-center">
		<div class="input-group">
    <input type="text" class="form-control" placeholder="Cari tempat wisata" name="search">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
      <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#demo">
        Advanced Search
      </button>
			</div>
		

<div id="demo" class="collapse filteredSearch">
		<div class="text-center">
		Harga minimum
        <input type="text" class="sliderValue" data-index="0" value="5000" name="hmin" />
				<i class="fas fa-minus"></i>
        <input type="text" class="sliderValue" data-index="1" value="500000" name="hmax"/>
		Harga maksimum
    <div id="slider"></div>
		</div>

		<div class="ratingbox">
			Rating: <br>
		<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="1" name="rating">
		<span class="fa fa-star checked"></span>
  </label>
	</div>

	<div class="form-check">
		<label class="form-check-label">
			<input type="checkbox" class="form-check-input" value="2" name="rating">
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
		</label>
	</div>

	<div class="form-check">
		<label class="form-check-label">
			<input type="checkbox" class="form-check-input" value="3" name="rating">
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
		</label>
	</div>

	<div class="form-check">
		<label class="form-check-label">
			<input type="checkbox" class="form-check-input" value="4" name="rating">
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
		</label>
	</div>

	<div class="form-check">
		<label class="form-check-label">
			<input type="checkbox" class="form-check-input" value="5" name="rating">
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
			<span class="fa fa-star checked"></span>
		</label>
	</div>

		</div>

		<div class="ratingbox">
			Category: <br>
	<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Instagramable" name="cat">
		<span class="fa fa-camera-retro"></span>
		Instagramable
  </label>
	</div>

	<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Kids Friendly" name="cat">
		<span class="fa fa-child"></span>
		Kids Friendly
  </label>
	</div>

	<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Education" name="cat">
		<span class="fa fa-book-open"></span>
		Education
  </label>
	</div>

	<div class="form-check">
  <label class="form-check-label">
    <input type="checkbox" class="form-check-input" value="Nature" name="cat">
		<span class="fa fa-tree"></span>
		Nature
  </label>
	</div>

	

		</div>
</div>

  
    
		</form>

  
        <div class="row row-offer">

				<?php foreach ($result as $data) : ?>

					<a href="<?php echo base_url().'index.php/Places/lihat_detail/'.$data->id_place?>">
          <div class="col-md-4">
              <div class="card text-center" style="width: 18rem; margin-top:20px">
                <div class="card-images">
                  <img class="card-img-top" src="<?php echo base_url()?>assets/images/wisata/<?= $data->img_place?>" alt="Card image cap">
                  </div>
                    <div class="card-body" style="min-height:200px">
                         <h5 class="card-title" style="color:black"><?= $data->nama_place ?></h5> <br>
                         <div class="cat-icon">

													<?php if($data->cat1 == "Instagramable" || $data->cat2=="Instagramable"){?>
                          <a href="#"><span class="fa fa-camera-retro fa-4x" data-toggle="tooltip" data-placement="top" title="Instagramable"></span></a>
							
													<?php }else if($data->cat1 == "Kids Friendly" || $data->cat2=="Kids Friendly"){?>
                          <a href="#"><span class="fas fa-child" data-toggle="tooltip" data-placement="top" title="Kids Friendly"></span></a>

													<?php }else if($data->cat1 == "Education" || $data->cat2=="Education"){?>
													<a href="#"><span class="fas fa-book-open" data-toggle="tooltip" data-placement="top" title="Education"></span></a>

													<?php }else if($data->cat1 == "Nature" || $data->cat2=="Nature"){?>
													<a href="#"><span class="fas fa-tree" data-toggle="tooltip" data-placement="top" title="Nature"></span></a>
													<?php }?>
                         </div> <br>
												 <?php
												 if($data->rating == 1){?>
												 
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star"></span>
                         <span class="fa fa-star"></span>
                         <span class="fa fa-star"></span>
                         <span class="fa fa-star"></span>

												 <?php
												 } else if($data->rating == 2){
												 ?>
												 
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star"></span>
                         <span class="fa fa-star"></span>
                         <span class="fa fa-star"></span>
													<?php } else if($data->rating == 3){?>
													
												 <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star"></span>
                         <span class="fa fa-star"></span>

													<?php } else if($data->rating == 4) {?>

												 <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star"></span>
													<?php } else if($data->rating == 5) {?>

												 <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>

												 <?php }?>
                         <p class="card-text">
												 <?= $data->alamat_place ?> <br>

                        </p>
												
                        
                    </div>
                
										<div class="card-footer"> <span style="float:left; font-weight:600"> Rp. <?php echo number_format($data->harga)?> </span></div>
                </div>
            </div>

						</a>

           <?php endforeach; ?>


        
           <script type="text/javascript">
 
						$(document).ready(function(){
							$('[data-toggle="tooltip"]').tooltip();   
						});
             
            </script>
    </section>
    
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
let showFilters = false;
if (showFilters){
 document.getElementById("FiltersBox").style.display = "grid";
} else {
 document.getElementById("FiltersBox").style.display = "none";
}

function toggleFilters (){
  showFilters = !showFilters;
  
  if (showFilters){
    document.getElementById("FiltersBox").style.display = "grid";
  } else {
    document.getElementById("FiltersBox").style.display = "none";
  }
}

function getResults() {
  $.ajax({
      url: "https://reqres.in/api/users",
      type: "GET",
      success: function(response){
          console.log(response);
      }
  });
}
</script>

