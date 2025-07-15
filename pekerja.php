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
<h4> Data Pekerja</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
              <form class="col-12" role="form" action="insertpekerja.php" method="post" enctype="multipart/form-data">
                    <label class="form-label col-2 offset-3">Nama Pekerja :</label>
                    <input type="text" id="nama" name="nama" class="form-select col-5">
                    <br>
                    <label class="form-label col-2 offset-3">Type Pekerja :</label>
                    <select id="type" name="type" class="form-select col-5">
                        <option value="Pengrajin">Pengrajin</option>
                        <option value="Serabut">Serabut</option>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">Upah :</label>
                    <input type="number" id="upah" name="upah" class="form-select col-3">
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
                <div class="text-x font-weight-bold text-success text-uppercase mb-1">Daftar Pekerja</div>
                <div class="table-responsive tab-pane fade show active" id="bb">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pekerja</th>
                            <th>Type</th>
                            <th>Upah</th>
                            <th>Action</th>
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'SELECT * FROM biaya_tenaga_kerja_langsung_standar';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama_btkl_standar'];?></td>
                                      <td><?php echo $row['type_btkl_standar'];?></td>
                                      <td><?php echo $row['upah_btkl_standar'];?></td>
                                      <td>
                                          <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $row['id_btkl_standar'];?>">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="deletepekerja.php?id=<?php echo $row['id_btkl_standar'];?>">Hapus
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
      $sql = 'SELECT * FROM biaya_tenaga_kerja_langsung_standar';
      $query = mysqli_query($koneksi, $sql);
          while ($row = mysqli_fetch_array($query))
            {
              ?>
      <div class="modal fade" id="exampleModal<?php echo $row['id_btkl_standar'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="col-12" role="form" action="updatepekerja.php" method="post" enctype="multipart/form-data">
                    <label class="form-label col-4">Nama Bahan Overhead :</label>
                    <input type="text" id="nama" name="nama" value="<?php echo $row['nama_btkl_standar'];?>" class="form-select col-6">
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id_btkl_standar'];?>" >
                    <br>
                    <label class="form-label col-2 offset-3">Type Pekerja :</label>
                    <select id="type" name="type" class="form-select col-5">
                        <?php if($row['type_btkl_standar'] == "Pengrajin"){?>
                           <option value="Pengrajin" selected>Pengrajin</option>
                           <option value="Serabut">Serabut</option>
                        
                        <?php }else{ ?>
                         <option value="Pengrajin">Pengrajin</option>
                         <option value="Serabut" selected>Serabut</option>
                        <?php } ?>
                       
                    </select>
                    <br>
                    <label class="form-label col-4">Harga :</label>
                    <input type="number" id="upah" name="upah" value="<?php echo $row['upah_btkl_standar'];?>" class="form-select col-6">
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
<?php include '_partial/footer.php'?>

  