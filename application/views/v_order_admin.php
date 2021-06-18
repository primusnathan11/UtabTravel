
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

	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/DataTables/datatables.css"/>
    <script type="text/javascript" src="<?php echo base_url()?>assets/DataTables/datatables.js"></script>

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
	
	<div class="container" style="padding-top:100px">
    <div class="row no-gutters">
			<h2>Your Activity</h2>
			<table class="table table-hover" id="TabelFunScience" style="width:100%;">
                            <thead class="thead-light">
							<tr>
								<th>ID</th>
								<th>Bukti</th>
								<th>Nama Pemesan</th>
								<th>Tanggal</th>
								<th>Status</th>
							</tr>
                            </thead>
                            <tbody>
							<?php foreach($orders as $data):?>
							<tr>
								<td><?php echo $data->id_pemesanan?></td>
								<td>
								<a href="<?php echo base_url('assets/images/upload_bukti/'.$data->foto_bukti);?>">
								<img src="<?php echo base_url('assets/images/upload_bukti/'.$data->foto_bukti);?>" alt="" style="width:100px; height:100px">
								</a>
								</td>
								<td><?php echo $data->nama_user?></td>
								<td><?php echo $data->tgl_upload?></td>
								<td>
								<?php if($data->status=="Menunggu Pembayaran"){?>
								<a href="<?php echo base_url().'Order/change_status/'.$data->id_pemesanan?>" class="btn btn-warning"><?php echo $data->status?></a>
								<?php } else{?>
								<a href="" class="btn btn-success"><?php echo $data->status?></a>
								<?php }?>
								</td>
							</tr>
							<?php endforeach?>
							</tbody>
				</table>
        
    </div>
</div>
  
	</body>
</html>

<script>
    $(document).ready( function () {
    $('#TabelFunScience').DataTable({
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Detail '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },
		"language": {
            "lengthMenu": "Menampilkan _MENU_ data per halaman",
            "zeroRecords": "Tidak ada data",
            "info": "Halaman ke _PAGE_ dari _PAGES_",
			"search":         "Cari:",
			"thousands":	".",
            "infoEmpty": "Tidak ada data",
            "infoFiltered": "(ditemukan dari _MAX_ data)",
			"paginate": {
        "first":      "Pertama",
        "last":       "Terakhir",
        "next":       "Selanjutnya",
        "previous":   "Sebelumnya"
    }
        },
        "columnDefs": [
        { "orderable": false, "targets": [9] },
        { "searchable": false, "targets":[9] }
    ]
    });
    } );
</script>

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
