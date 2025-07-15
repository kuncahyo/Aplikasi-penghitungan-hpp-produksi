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
<h4> Data Pelanggan</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
              <form class="col-12" role="form" action="insertuser.php" method="post" enctype="multipart/form-data">
                    <label class="form-label col-2 offset-3">Username :</label>
                    <input type="text" id="username" name="username" class="form-select col-5">
                    <br>
                    <label class="form-label col-2 offset-3">Password :</label>
                    <input type="password" id="password" name="password" class="form-select col-3">
                    <br>
                    <label class="form-label col-2 offset-3">Type User :</label>
                    <select id="type" name="type" class="form-select col-5">
                       <option value="0" >Keuangan/Produksi</option> 
                       <option value="1" >Pimpinan</option>
                    </select>
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
                <div class="text-x font-weight-bold text-success text-uppercase mb-1">Daftar Pelanggan</div>
                <div class="table-responsive tab-pane fade show active" id="bb">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Type User</th>
                            <th>Action</th>
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'SELECT * FROM user';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['username'];?></td>
                                      <?php if ($row['type'] > 0) {?>
                                        <td>Pimpinan</td>
                                      <?php } else {?>
                                        <td>Keuangan/Produksi</td>
                                      <?php } ?>
                                      
                                      <td>
                                      <a class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $row['id'];?>">Edit</a>
                                          <br>
                                          <a class="btn btn-danger" href="deleteuser.php?id=<?php echo $row['id'];?>">Hapus
                                      
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
      $sql = 'SELECT * FROM user';
      $query = mysqli_query($koneksi, $sql);
          while ($row = mysqli_fetch_array($query))
            {
              ?>
      <div class="modal fade" id="exampleModal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="col-12" role="form" action="updateuser.php" method="post" enctype="multipart/form-data">
                    <label class="form-label col-4">Username :</label>
                    <input type="text" id="username" name="username" value="<?php echo $row['username'];?>" class="form-select col-6">
                    <input type="hidden" id="id" name="id" value="<?php echo $row['id'];?>" >
                    <br>
                    <label class="form-label col-4">Password :</label>
                    <input type="tex" id="password" name="password" class="form-select col-6" >
                    <br>
                    <label class="form-label col-4">Type User :</label>
                    <select id="type" name="type" class="form-select col-5">
                      <?php if ($row['type'] > 0) {?>
                        <option value="0" >Keuangan/Produksi</option> 
                        <option value="1" selected>Pimpinan</option>
                      <?php } else {?>
                        <option value="0" selected>Keuangan/Produksi</option> 
                        <option value="1" >Pimpinan</option>
                      <?php } ?>
                      
                    </select>
                    <br>
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

  