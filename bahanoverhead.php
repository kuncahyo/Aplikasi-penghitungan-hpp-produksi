    <?php
        include '_partial/head.php';
        include '_partial/sidebar.php';
        include 'koneksi1.php';
    ?>


      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
<h4>Overhead variabel</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
              <form class="col-12" role="form" action="insertbahanoverhead.php" method="post" enctype="multipart/form-data">
                    <label class="form-label col-2 offset-3">Nama Produk :</label>
                    <input type="text" id="nama" name="nama" class="form-select col-5">
                    <br>
                    <label class="form-label col-2 offset-3">Satuan Produk:</label>
                    <input type="text" id="satuan" name="satuan" class="form-select col-3">
                    <br>
                    <label class="form-label col-2 offset-3">Harga :</label>
                    <input type="text" id="rupiah" name="harga" class="form-select col-3">
                    <br>
                  <div class="button col-5 offset-3">
                    <button class="btn btn-success" type="submit">Tambah Data</button>
                    <br>
                  </div>
              </form>
          </div>
          <br><br>
            <div class="row">
            <div class="col-xl-12">
                <!-- <button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus"> Produk</i></button><br> -->
                <div class="card shadow mb-4">
                <div class="card-body tab-content" id="myTabContent">
                <div class="text-x font-weight-bold text-success text-uppercase mb-1">Daftar Overhead variabel</div>
                <div class="table-responsive tab-pane fade show active" id="bb">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Action</th>
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'SELECT * FROM bop_variabel_standar';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama_variabel_standar'];?></td>
                                      <td><?php echo $row['satuan_variabel_standar'];?></td>
                                      <td><?php echo number_format($row['harga_variabel_standar']);?></td>
                                      <td>
                                          <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $row['id_variabel_standar'];?>">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="deletebahanoverhead.php?id=<?php echo $row['id_variabel_standar'];?>">Hapus
                                      </td>                          
                                  </tr>
                                
                        <!-- Modal -->
                          <!--akhir modal-->
                          <?php } ?>
                       
                                       
                      <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
              </div>
            </div>
            </div>
            </div>
            </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <?php
      $sql = 'SELECT * FROM bop_variabel_standar';
      $query = mysqli_query($koneksi, $sql);
          while ($row = mysqli_fetch_array($query))
            {
              ?>
      <div class="modal fade" id="exampleModal<?php echo $row['id_variabel_standar'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="col-12" role="form" action="updatebahanoverhead.php" method="post" enctype="multipart/form-data">
                    <label class="form-label col-4">Nama Bahan Overhead :</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $row['nama_variabel_standar'];?>" class="form-select col-6">
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id_variabel_standar'];?>" >
                    <br>
                    <label class="form-label col-4">Satuan:</label>
                    <input type="text" id="satuan" name="satuan" value="<?php echo $row['satuan_variabel_standar'];?>" class="form-select col-6">
                    <br>
                    <label class="form-label col-4">Harga :</label>
                    <input type="number" id="harga" name="harga" value="<?php echo $row['harga_variabel_standar'];?>" class="form-select col-6">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
      <script>
      var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
  rupiah.value = convertRupiah(this.value);
});
rupiah.addEventListener('keydown', function(event) {
	return isNumberKey(event);
});

function convertRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split  = number_string.split(","),
    sisa   = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	if (ribuan) {
		separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
	}

	rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
}

function isNumberKey(evt) {
    key = evt.which || evt.keyCode;
	if ( 	key != 188 // Comma
		 && key != 8 // Backspace
		 && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
		 && (key < 48 || key > 57) // Non digit
		) 
	{
		evt.preventDefault();
		return;
	}
}
      </script>
<?php include '_partial/footer.php'?>

  