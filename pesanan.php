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
<h4> Data Pesanan</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
              <form class="col-12" role="form" action="insertpesanan.php" method="post" enctype="multipart/form-data">
                    
                    <label class="form-label col-2 offset-3">Kategori Produk :</label>
                    <select id="id_kategori_produk" name="id_produk" class="form-select col-5">
                       <?php  $sql = 'SELECT * FROM produk ';
                          $query = mysqli_query($koneksi, $sql); 
                             while ($row = mysqli_fetch_array($query))
                                {
                                 echo '<option value="'.$row['id_produk'].'" > '.$row['nama_produk'].'</option>';
                                }?>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">Panjang x Lebar x Tinggi :</label>
                    <input type="text" id="panjang" name="panjang" placeholder="panjang" class="form-select col-1">
                    <input type="text" id="lebar" name="lebar" placeholder="lebar" class="form-select col-1"><!-- comment -->
                    <input type="text" id="tinggi" name="tinggi" placeholder="tinggi" class="form-select col-1">
                    <br>
                    <label class="form-label col-2 offset-3">Rincian informasi :</label>
                    <input type="text" id="nama" name="nama" class="form-select col-5">
                    <br>
                    <label class="form-label col-2 offset-3">Nama Pelanggan :</label>
                    <select id="pelanggan" name="pelanggan" class="form-select col-5">
                       <?php  $sql = 'SELECT * FROM pelanggan ';
                          $query = mysqli_query($koneksi, $sql); 
                             while ($row = mysqli_fetch_array($query))
                                {
                                 echo '<option value="'.$row['id_pelanggan'].'" > '.$row['nama_pelanggan'].'</option>';
                                }?>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">Tanggal Pesanan :</label>
                    <input type="date" id="tgl_pesanan" name="tgl_pesanan" class="form-select col-3">
                    <br>
                    <label class="form-label col-2 offset-3">Tanggal Tempo :</label>
                    <input type="date" id="tgl_jatuhtempo" name="tgl_jatuhtempo" class="form-select col-3">
                    <br>
                  <div class="button col-5 offset-3">
                    <button class="btn btn-success" name="tambahpesan" type="submit">Tambah Data</button>
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
                <div class="text-x font-weight-bold text-success text-uppercase mb-1">Daftar Pesanan</div>
                <div class="table-responsive tab-pane fade show active" id="bb">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pesanan</th>
                            <th>Panjang x lebar x tinggi</th>
                            <th>Pelanggan</th>
                            <th>Tanggal Pesanan</th>
                            <th>Tanggal Jatuh Tempo</th>
                            <th>Action</th>
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'SELECT pesanan.*,pelanggan.nama_pelanggan as pelanggan FROM pesanan join pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama'];?></td>
                                      <td><?php echo $row['panjang']."x".$row['lebar']."x".$row['tinggi'];?></td>
                                      <td><?php echo $row['pelanggan'];?></td>
                                      <td><?php echo $row['tgl_pesanan'];?></td>
                                      <td><?php echo $row['tgl_jatuhtempo'];?></td>
                                      <td>
                                          <br>
                                          <a class="btn btn-danger" href="delete-pesanan.php?id=<?php echo $row['id'];?>">Hapus
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

<?php include '_partial/footer.php'?>

  