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

<main class="container-detail">
 
  <!-- Left Column / Headphones Image -->
	<?php foreach($detail as $data) : ?>
  <div class="left-column">
    <img data-image="black" src="<?php echo base_url()?>assets/images/wisata/<?= $data->id_place ?>.jpg" alt="" class="imgDetail">
  </div>
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
		
      <h1><?php echo $data->nama_place?></h1>
			<?php
												 if($data->rating == 1){?>
												 
                         <span class="fa fa-star checked"></span>

												 <?php
												 } else if($data->rating == 2){
												 ?>
												 
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
													<?php } else if($data->rating == 3){?>
													
												 <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>

													<?php } else if($data->rating == 4) {?>

												 <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
													<?php } else if($data->rating == 5) {?>

												 <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>

												 <?php }?>
      <p><?php echo $data->deskripsi?> 
	  <?php if($data->jenis=="Wisata"){?>
	  <br> <br>
	  <i class="far fa-clock"></i> <?php echo $data->jam_buka." - ".$data->jam_tutup;?> 

	  <?php } else if($data->jenis=="Kuliner"){?>
		<br> <br>
	  <i class="far fa-clock"></i> <?php echo $data->jam_buka." - ".$data->jam_tutup;?> 
	  <?php }?>
	  </p>
    </div>
 
 
    <!-- Product Pricing -->
    <div class="product-price">
	<?php if($data->jenis== "Wisata"){?>
      <span>Rp. <?php echo number_format($data->harga)?></span>
	  <?php if($this->session->userdata('logged_in') == TRUE){?>
      <a href="<?php echo base_url("Order/checkout_form/".$url_place)?>" class="btn btn-primary">Pesan Sekarang</a>
		<?php } else{?>
			<a href="<?php echo base_url()?>Login" class="btn btn-primary"> Login untuk pesan</a>
		<?php }?>
		<?php } else if($data->jenis== "Hotel") { ?>
			<span>Rp. <?php echo number_format($data->harga)?></span>
		<?php } ?>
    </div>
  </div>
</main>


<?php endforeach; ?>

<section id="comment-section">

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="d-flex flex-column col-md-12">
            <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                <div class="d-flex flex-column ml-3">
                    <div class="d-flex flex-row post-title">
                        <h5 style="margin-top:10px;">Komentar</h5>
                    </div>
                    </div>
            </div>

						<?php if($this->session->userdata('logged_in') == TRUE){?>
						<form action="<?=base_url('Places/komentar/'.$url_place)?>" method="POST">
            <div class="coment-bottom bg-white p-2 px-4">
                <div class="d-flex flex-row add-comment-section mt-4 mb-4">
									
									<textarea name="komentar" class="form-control mr-3" rows="1"></textarea>
									<button class="btn btn-primary" type="submit">Kirim</button>

								</div>
						</form>
						<?php } else {?>
							<div class="coment-bottom bg-white p-2 px-4">
                <div class="d-flex flex-row add-comment-section mt-4 mb-4">
							<a href="<?php echo base_url()?>Login" class="btn btn-primary"> Login untuk menambahkan komentar</a>
							</div>
						<?php }?>
                
						<?php foreach($comments as $komen) : ?>
								<div class="commented-section mt-2">
                    <div class="d-flex flex-row align-items-center commented-user">
                        <h5 class="mr-2"><?php echo $komen->nama_user?></h5><span class="dot mb-1"></span><span class="mb-1 ml-2"><?php echo $komen->tgl_comment?></span>
                    </div>
                    <div class="comment-text-sm"><span><?php echo $komen->isi_comment?></span></div>
                    <div class="reply-section">
                    
                    </div>
                </div>
						<?php endforeach; ?>
      
            </div>
        </div>
    </div>
</div>

</section>

<section class="mapsection text-center" style="margin-top:50px;">
<h1>Maps</h1>
<?php if($url_place == 1){?>

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.9802304544005!2d112.55091401477866!3d-7.897133794310846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78811848f3a957%3A0x1b0013b35e7ee3cd!2sJawa%20Timur%20Park%203!5e0!3m2!1sen!2sid!4v1623257298145!5m2!1sen!2sid" 
	width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

	<?php } else if($url_place == 2){?>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.8358148293314!2d112.51674611538364!3d-7.91221378094578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78839aaaaaaaab%3A0x3419559ecb0a69c7!2sBatu%20Flower%20Garden!5e0!3m2!1sen!2sid!4v1623257512614!5m2!1sen!2sid" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 3){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1976.0521109840042!2d112.52382340820688!3d-7.884163641723535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880d52e0379d9%3A0x9c94d817cc2686bb!2sJatim%20Park%20I%2C%20Jl.%20Dewi%20Sartika%20Atas%2C%20Sisir%2C%20Kec.%20Batu%2C%20Kota%20Batu%2C%20Jawa%20Timur%2065314!5e0!3m2!1sen!2sid!4v1623257578220!5m2!1sen!2sid" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					
					<?php } else if($url_place == 4){?>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0661903897235!2d112.52713901472656!3d-7.888144194317161!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78812d0afa4bc5%3A0x78f3e619b596e45a!2sJatim%20Park%202!5e0!3m2!1sen!2sid!4v1623829229654!5m2!1sen!2sid" 
						width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 5){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.157270788584!2d112.51758921538328!3d-7.8786079805371285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78872dd3cd2c13%3A0x3295038cd23c1d38!2sMuseum%20Angkut!5e0!3m2!1sen!2sid!4v1623257723612!5m2!1sen!2sid" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 6){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31622.93479226092!2d112.49896926872215!3d-7.803917890079251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e787c2ce82a23e5%3A0xdf919103ce46bd85!2sCoban%20Talun%20Waterfall!5e0!3m2!1sen!2sid!4v1623326859828!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
				<?php } else if($url_place == 7){ ?>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.380963462316!2d112.4966888!3d-7.8551383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7887fbc3e96b31%3A0x959ffe132aa1bd4e!2sParalayang!5e0!3m2!1sen!2sid!4v1623332667253!5m2!1sen!2sid" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					
				<?php } else if($url_place == 8){ ?>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1975.993020047611!2d112.5336520081658!3d-7.896526548577829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881303f2c72db%3A0x953ed7171a77ec21!2sBatu%20Night%20Spectacular%20(BNS)!5e0!3m2!1sen!2sid!4v1623333003932!5m2!1sen!2sid" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
				<?php } else if($url_place == 9){ ?>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.382813733502!2d112.49561641538305!3d-7.854943880250517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788767ad6b5f41%3A0x3d3ec4a43a5e9126!2sOmah%20Kayu!5e0!3m2!1sen!2sid!4v1623334792198!5m2!1sen!2sid" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
				<?php } else if($url_place == 10){ ?>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.838925331542!2d112.51844291538362!3d-7.911889280941753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7886b3880e2a7f%3A0x50ba9e6c895a7908!2sCoban%20Putri!5e0!3m2!1sen!2sid!4v1623335262487!5m2!1sen!2sid" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					
				<?php }else if($url_place == 11){?>

					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.030988566968!2d112.5210428147789!3d-7.8918267943145874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7886d39fe02377%3A0x6dd3c9a6c3493a8!2sGolden%20Tulip%20Holland%20Resort%20Batu!5e0!3m2!1sen!2sid!4v1623828125877!5m2!1sen!2sid" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 12){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.056067212843!2d112.51203171477877!3d-7.889203394316432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788728548264fb%3A0x906c31131f7f6b09!2sAmarta%20Hills%20Hotel%20and%20Resort!5e0!3m2!1sen!2sid!4v1623828857239!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

					<?php } else if($url_place == 13){?>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.985911462019!2d112.55052961472661!3d-7.896539994311291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881c9d4250f01%3A0xcdebcd2e27a6cd08!2sSenyum%20World%20Hotel!5e0!3m2!1sen!2sid!4v1623829056525!5m2!1sen!2sid" 
						width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
							
							<?php } else if($url_place == 14){?>
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.109385074078!2d112.51347931472633!3d-7.883623094320335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78872c715cd301%3A0x97643e8c05c45e57!2sKusuma%20Agrowisata%20Resort%20%26%20Convention%20Hotel!5e0!3m2!1sen!2sid!4v1623829328740!5m2!1sen!2sid" 
								width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 15){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1919.8090504787294!2d112.5286546728827!3d-7.881737760970001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78812756d6007b%3A0x5a7d48319c393cb3!2sKontena%20Hotel!5e0!3m2!1sen!2sid!4v1623829496199!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 16){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.119534560349!2d112.51773061472646!3d-7.882560394321087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78872bc07de4e7%3A0xb5592e414969da96!2sAston%20Inn%20Batu!5e0!3m2!1sen!2sid!4v1623829668902!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
			<?php } else if($url_place == 17){ ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.018517857697!2d112.54802531472652!3d-7.893130994313663!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7881305f83d69f%3A0xac56ebc0fb3dc9f4!2sThe%20Singhasari%20Resort%20%26%20Convention%20Batu!5e0!3m2!1sen!2sid!4v1623829867580!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
			<?php } else if($url_place == 18){ ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0938941485038!2d112.51948951472656!3d-7.885244794319179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78823e55555555%3A0x6833c9f85692636c!2sKlub%20Bunga%20Boutique%20Resort!5e0!3m2!1sen!2sid!4v1623829996994!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			
			<?php } else if($url_place == 19){ ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5882743847556!2d112.52676031472623!3d-7.83332499435569!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e787e08c2ccdea3%3A0x6af2018d348fe20b!2sSpencer%20Green%20Hotel%20Batu!5e0!3m2!1sen!2sid!4v1623830266660!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			
			<?php } else if($url_place == 20){ ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.148583015497!2d112.53180151472644!3d-7.87951809432323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880d0db04ff1f%3A0xebfd119e92c9d6f3!2sDe&#39;Lobby%20-%20Suite%20Hotel!5e0!3m2!1sen!2sid!4v1623830372556!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			
			<?php }else if($url_place == 21){?>

				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.2340519366057!2d112.51693031472645!3d-7.8705599943295175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880d12741040b%3A0x83c931aa6d42d94a!2sOmah%20Kitir!5e0!3m2!1sen!2sid!4v1623831156710!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 22){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5077980485466!2d112.52629001472624!3d-7.841799894349722!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e787e011a956a01%3A0xa6b9e55c71d36daf!2sWaroeng%20Bamboe%20Lesehan%20Sidomulyo!5e0!3m2!1sen!2sid!4v1623830989385!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 23){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.272657320928!2d112.5094105147264!3d-7.866510394332355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e788737f820bb3d%3A0xfdaefe3135612e06!2sPupuk%20Bawang!5e0!3m2!1sen!2sid!4v1623831222799!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					
			<?php } else if($url_place == 24){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.1232828505485!2d112.53602221472651!3d-7.882167894321437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880d9b9c6cfad%3A0x1682847bf7a58d77!2sWarung%20Sate%20Hotplet%20Batu!5e0!3m2!1sen!2sid!4v1623831448119!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 25){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.3075325626646!2d112.5266892147264!3d-7.862850294334959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880b870f94b1b%3A0xc202a92d0ec575cf!2sWarung%20Wareg!5e0!3m2!1sen!2sid!4v1623831570992!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 26){?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.230308177899!2d112.52380661472641!3d-7.870952594329267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7880cc98ace265%3A0x814879a4d6aa759e!2sPos%20Ketan%20Legenda%20-%201967!5e0!3m2!1sen!2sid!4v1623831675880!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 27){ ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.162418241686!2d112.51872821472651!3d-7.878068694324221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78872daf8f372f%3A0x9d284093e9be8f21!2sWarunk%20Ria%20Djenaka!5e0!3m2!1sen!2sid!4v1623831785017!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 28){ ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.061400399217!2d112.52722391472658!3d-7.888645394316827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78812bcc0110e1%3A0xe886406eb6db4cc1!2sJungle%20Fastfood!5e0!3m2!1sen!2sid!4v1623831942103!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 29){ ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5505391693255!2d112.5397436147262!3d-7.8372999943528985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e787ffd4bc8cef5%3A0x69f5b834c333c494!2sKopi%20Sontoloyo!5e0!3m2!1sen!2sid!4v1623832021312!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 30){ ?>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.28118490707!2d112.48661791472625!3d-7.865615594332964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78876d63477383%3A0x911258b2e7a9a820!2sPayung%20Kota%20Wisata%20Batu!5e0!3m2!1sen!2sid!4v1623832121069!5m2!1sen!2sid" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			<?php } else ?>

	
	
		
	
</section>

<section class="360section text-center" style="margin-top:50px; margin-bottom:50px">
<h1>360 view</h1>
<?php if($url_place == 1){?>

	<iframe src="https://www.google.com/maps/embed?pb=!4v1623259086431!6m8!1m7!1spf8Or6HFEliI_bkpQad0ig!2m2!1d-7.896798156735914!2d112.5531418838412!3f202.18787159955934!4f7.061077282611905!5f0.7820865974627469" 
		width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

	<?php } else if($url_place == 2){?>
		<iframe src="https://www.google.com/maps/embed?pb=!4v1623259342678!6m8!1m7!1sCAoSLEFGMVFpcE1vOFpia09OcWlNNkRrY2ZWOWtRMjN3MmZCUFF0WGxJU1hqcGhC!2m2!1d-7.912219099999999!2d112.5189348!3f349.8256174543536!4f-4.952589825140407!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 3){?>
				<iframe src="https://www.google.com/maps/embed?pb=!4v1623259743173!6m8!1m7!1sCAoSLEFGMVFpcE1mT0lRVDVTTzBYZ3Iyek1aREY3cGlHV1hERWsycHh3dlNoVkNi!2m2!1d-7.883906915276238!2d112.524783293881!3f174.79887260876674!4f10.417014853613594!5f0.7820865974627469" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					
					<?php } else if($url_place == 4){?>
						<iframe src="https://www.google.com/maps/embed?pb=!4v1623260107465!6m8!1m7!1smbPkATNS-HwPytJTH7ZsiA!2m2!1d-7.887436233172139!2d112.530251670066!3f195.131047655124!4f7.062691449200059!5f0.7820865974627469" 
							width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 5){?>
				<iframe src="https://www.google.com/maps/embed?pb=!4v1623260853338!6m8!1m7!1siLcqMJgOBj7hTFntn2XHVw!2m2!1d-7.878513756648764!2d112.5205327006268!3f238.3766410583282!4f25.05886566056732!5f0.7820865974627469" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			<?php } else if($url_place == 6){?>
				<iframe src="https://www.google.com/maps/embed?pb=!4v1623327050510!6m8!1m7!1sCAoSLEFGMVFpcE1FZWdoNE5sdjRsWDJ1eEt3YlZoWTJtYlNDV3oxUVlYYW9SQl9D!2m2!1d-7.8039184!2d112.5164789!3f5.1038510296743524!4f26.512769611276653!5f0.7820865974627469" 
				width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	<?php } else if($url_place == 7){ ?>
		<iframe src="https://www.google.com/maps/embed?pb=!4v1623332604758!6m8!1m7!1sCAoSLEFGMVFpcFA2NXN0MmplcjFIYndCNmo1NGpGR0ozZkttRGdtZWhsbkFoZmt2!2m2!1d-7.8551383!2d112.4966888!3f41.99340874530939!4f10.773193738324238!5f0.7820865974627469" 
		width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		
	<?php } else if($url_place == 8){ ?>
		<iframe src="https://www.google.com/maps/embed?pb=!4v1623333345073!6m8!1m7!1sCAoSLEFGMVFpcE9OV013dUtaRGd2NHJhM09WQXV6ZzBZWlBUQXpWTWlHX1Z0V29Z!2m2!1d-7.8967695!2d112.5347519!3f237.69232538380243!4f7.109424191784797!5f0.7820865974627469" 
		width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	
	<?php } else if($url_place == 9){ ?>
		<iframe src="https://www.google.com/maps/embed?pb=!4v1623335033457!6m8!1m7!1sCAoSLEFGMVFpcE45a0Jia0lUeTM5U1JOTmdnQ2psSEpTS1pqOE1rbFZZRmREWi1h!2m2!1d-7.855173100000001!2d112.4977951!3f345.6577936063106!4f4.286127471604033!5f0.4000000000000002" 
		width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		
	<?php } else if($url_place == 10){ ?>
		<iframe src="https://www.google.com/maps/embed?pb=!4v1623335318959!6m8!1m7!1sCAoSLEFGMVFpcE1UT1FMaEd0XzRXU0s2S3VFMDN1ajJOQkJqbVhOYnVla0ZJbUho!2m2!1d-7.912025499999999!2d112.5207542!3f315.27164077668317!4f2.8716875982415786!5f0.7820865974627469" 
		width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		
		<?php }else if($url_place == 11){?>

			<iframe src="https://www.google.com/maps/embed?pb=!4v1623828366802!6m8!1m7!1sCAoSLEFGMVFpcE55ak5VcUZFZGxzemJRX3p6cHBsOFJicXpxbTB1ODFnZ0ZZcU1O!2m2!1d-7.890998296296869!2d112.5231650256145!3f346.6311515360028!4f2.302414294345013!5f0.4000000000000002" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 12){?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623828922609!6m8!1m7!1sCAoSLEFGMVFpcE5TQms1Tld1QWx2RXR6cThoR1FoeklETXNVRHpPM0UwQ1lCYjVR!2m2!1d-7.889203399999999!2d112.5142204!3f341.7764226408342!4f9.947169045678663!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 13){?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623829134801!6m8!1m7!1sCAoSLEFGMVFpcE9tMjJ5WDc2MkZwMDdjVlNFejMtS245Uk02dDdqMzJiWnoxUjRE!2m2!1d-7.89654034836693!2d112.5527938650559!3f304.02469472237283!4f39.26704159639891!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
				<?php } else if($url_place == 14){?>
					<iframe src="https://www.google.com/maps/embed?pb=!4v1623829421578!6m8!1m7!1sCAoSLEFGMVFpcE82cHVpemJiaHpfMTRBNXptZmxtOVltVktPV2VqR3QyQnBwZVhR!2m2!1d-7.881774900000001!2d112.5160294!3f210.06948523364548!4f-0.9764489382594235!5f0.7820865974627469" 
					width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 15){?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623829590102!6m8!1m7!1sCAoSLEFGMVFpcFBkb0Y5VUdhNUNkUGM0eEhaMi0zZ20zSnkyY1hwd1hXY29tZ0Vx!2m2!1d-7.881680899999999!2d112.5294021!3f222.7351294940942!4f9.926801972316596!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 16){?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623829790421!6m8!1m7!1sUno-dSMgf5xUwJcOvjiXHQ!2m2!1d-7.88259159048213!2d112.5202712471357!3f258.7373211292228!4f12.387759271292026!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 17){ ?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623829937071!6m8!1m7!1sCAoSLEFGMVFpcE1Qb240ZmRIOENLNFZ5cVZ3SWVRdG5GeVY5bnp1MXpQVnl1QUJS!2m2!1d-7.894030600000001!2d112.5491562!3f216.22961164827234!4f6.879854947113941!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 18){ ?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623830080181!6m8!1m7!1sCAoSLEFGMVFpcE1nZWpyMFRPXzlYYlItUW10U0Q4X01LZjlRR1RyS3FGbTByS0dH!2m2!1d-7.885737!2d112.521307!3f235.17711206772148!4f14.062946373859262!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 19){ ?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623830318521!6m8!1m7!1sj9TZ3XD0eGiNj8ub_o_YaA!2m2!1d-7.833305455715008!2d112.5286428885063!3f132.97779055899815!4f13.039906142097763!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 20){ ?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623830417502!6m8!1m7!1sh7bZYLSp7JNrPn8t9Yqwbw!2m2!1d-7.879410818108458!2d112.5338782551323!3f141.43057538499366!4f19.938064982122157!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			
		<?php }else if($url_place == 21){?>

			<iframe src="https://www.google.com/maps/embed?pb=!4v1623830741654!6m8!1m7!1sCAoSLEFGMVFpcE9fRFI5NVNPaE1RSHN1bG5yUTdLSXgzaXhVWVBleEMwOFZsV2V0!2m2!1d-7.870589799999999!2d112.5192446!3f220.38115003001624!4f14.02791768020137!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 22){?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623831071241!6m8!1m7!1sCAoSLEFGMVFpcE1JYko2MkViZGVQUnNaNGpvcHE5NDJGeGJSbUVfdnFWa3kzZDVx!2m2!1d-7.8418867!2d112.5286883!3f328.1587483659767!4f-1.0283427094575615!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 23){?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623831294609!6m8!1m7!1sCAoSLEFGMVFpcE0zeGlpeVRoZnhhUWxaSVZsRVFVdTFzMHdMQ1RPeDdpcDhYR0Qz!2m2!1d-7.866295!2d112.5115193!3f258.2056985040913!4f8.302515958149385!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
		<?php } else if($url_place == 24){?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623831500974!6m8!1m7!1sEocAdSrmADeMxUnSBD7VyQ!2m2!1d-7.882165180124782!2d112.5379931456142!3f74.47387115016363!4f3.0105549099635027!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 25){?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623831638241!6m8!1m7!1sCAoSLEFGMVFpcE1EXzRVNThQbmZZZnlEUkd0bmJCTVlsa3ZVUml2dXFvU1l1SGx4!2m2!1d-7.8629826!2d112.5288834!3f346.25241546064825!4f12.208839478243434!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 26){?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623831719765!6m8!1m7!1sIDr2H5Wezuo_fcI9ALe5UA!2m2!1d-7.871048862923126!2d112.5260262928869!3f319.3105603712808!4f-4.080573997154531!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 27){ ?>
			Maaf, belum tersedia 360 view untuk tempat ini.

		<?php } else if($url_place == 28){ ?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623831969787!6m8!1m7!1sCAoSLEFGMVFpcE9Pc0R0VV9neVcyTW9rS0V6ZFJ2bV9vNExISjZ2S21Rd2otdWVs!2m2!1d-7.8886454!2d112.5294126!3f94.47030650709002!4f4.892078841769944!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 29){ ?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623832062837!6m8!1m7!1sCAoSLEFGMVFpcFAyNHoxaGtMcUtmVy1kNHdKeVZvdFRqVFZHcUpvaW5rdENzMmJZ!2m2!1d-7.837379400000001!2d112.5418777!3f271.7212457931286!4f-0.6784197383915256!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

		<?php } else if($url_place == 30){ ?>
			<iframe src="https://www.google.com/maps/embed?pb=!4v1623832152432!6m8!1m7!1srcDpAAHH6M3yCaedVaIZrw!2m2!1d-7.865691729553668!2d112.4888243806366!3f71.042868817996!4f-1.7643113157371744!5f0.7820865974627469" 
			width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		<?php } else ?>
		
	
</section>
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

