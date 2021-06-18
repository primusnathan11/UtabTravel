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

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>DataTables/datatables.min.css"/>
 
	<script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/datatables.min.js"></script>

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
	
	<div class="container" style="padding-top:100px">
    <div class="row no-gutters">
			<h2>Your Activity</h2>
        <div class="col-md-12">
            <div class="product-details mr-2">
						<?php foreach($orders as $data) : ?>
                <div class="d-flex justify-content-between align-items-center mt-3 p-2 items rounded">
                    <div class="d-flex flex-row"><img class="rounded img-order-list" src="<?php echo base_url()?>assets/images/wisata/<?= $data->id_place ?>.jpg" width="40">
                        <div class="ml-2"><span class="font-weight-bold d-block"><?php echo $data->nama_place?></span><span class="spec"><?php echo $data->tgl_pemesanan?></span></div>
                    </div>
                    <div class="d-flex flex-row align-items-center">
										<span class="d-block">Qty: <?php echo $data->qty?></span><span class="d-block ml-5 font-weight-bold">Rp. <?php echo number_format($data->total_harga)?></span></div>
										<?php if($data->status=="Menunggu Pembayaran"){?>
										<a href="#modal_bukti<?php echo $data->id_pemesanan?>" class="btn btn-warning" onclick="tm_detail('<?php echo ($data->id_pemesanan)?>'" data-toggle="modal" ><?php echo $data->status?></a>
										<?php } else{ ?>
										<a href="#" class="btn btn-success" onclick="tm_detail('<?php echo ($data->id_pemesanan)?>'"><?php echo $data->status?></a>
										<?php }?>
									</div>

									<div id="modal_bukti<?php echo $data->id_pemesanan?>" class="modal fade" role="dialog">
									<div class="modal-dialog">

										<!-- Modal content-->
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Upload Bukti Pembayaran</h4>
												<button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
											<div class="alert alert-primary" role="alert">
											Pembayaran akan diverifikasi selama 5 menit hingga 1 jam setelah anda upload bukti pembayaran.
											</div>
												Transfer ke rekening <?php echo $data->payment?> - 
												<?php if($data->payment=="BCA"){
														echo" 0111924101";
												}
												else if($data->payment=="Mandiri"){
													echo" 14400921";
												}
												else if($data->payment=="BNI"){
													echo" 1300295302";
												}
												
												?> 
												sebesar Rp. <?php echo number_format($data->total_harga)?>
												<form action="<?php echo base_url('index.php/Order/upload_bukti')?>" method="post" enctype="multipart/form-data">
												<input type="hidden" id="id_pemesanan" name="id_pemesanan" value="<?php echo $data->id_pemesanan?>">
												<input type="file" name="foto_bukti" class="form-control" required>
											</div>
											<div class="modal-footer">
												<input type="submit" value="Upload" class="btn btn-primary">
												</form>
											</div>
										</div>

									</div>
								</div>

						<?php endforeach;?>
            </div>
        </div>
        
    </div>
</div>
  
	</body>
</html>


<script>
function tm_detail(id_pemesanan) {
$.getJSON("<?=base_url()?>index.php/Order/get_detail_order/"+id_pemesanan,function(data){
console.log(data);
$("#id_transaksi").val(data['id_transaksi']);
$("#total_harga").val(data['total_harga']);
$("#payment").val(data['payment']);
});
}
</script>
