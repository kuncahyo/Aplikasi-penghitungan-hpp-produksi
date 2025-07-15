    <?php
        include '_partial/head.php';
        include '_partial/sidebar.php';
        include 'koneksi1.php';
    ?>
  <script>
      function cekdata($id){
          //alert($id);
           const xhttp = new XMLHttpRequest();
          xhttp.onload = function() {
            document.getElementById("items").innerHTML =
            this.responseText;
          }
          xhttp.open("GET", "get_data_kategori.php?id_kategori="+$id);
          xhttp.send();
      }
  </script>
  <script>
      function loadData(){
          $.get('hpp_standart.php',function(data){
              $('#fild-update').html(data);
          });
          $('.btupdatedata').click(function(e){
              e.preventDefault();
              $.ajax({
                  type: 'post',
                  url: $(this).attr('href'),
                  success:function(results) {
                      loadData();
                      alert(results);
                      $('[name=nama]').val($(this).attr('nama'));
              $('[name=harga]').val($(this).attr('harga'));
              $('[name=qty]').val($(this).attr('qty'));
            }
              });
              
          });
      }
  
  </script>

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
<h4> Daftar HPP Standart</h4>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <br>
           <div class="row col-12">
              <form class="col-12" role="form" action="inserthppstandart.php" method="post" enctype="multipart/form-data">
                  <label class="form-label col-2 offset-3">Kategori:</label>
                    <select id="kategori" name="kategori" class="form-select col-5" onchange="cekdata(this.value)">
                       <option value="0" >Pilih kategori</option> 
                       <option value="1" >Bahan Baku</option>
                       <option value="2" >Pekerja</option>
                       <option value="3" >Biaya Overhead tetap</option>
                       <option value="4" >Biaya Overhead Variable</option>
                       <option value="5" >Custom</option>
                    </select>
                    <label class="form-label col-2 offset-3">Input Item :</label>
                    <input type="hidden" id="id_pesanan" name="id_pesanan" value="<?php echo $_GET['id']?>" class="form-select col-5">
                    <input type="hidden" id="id_pesanan" name="id_pro" value="<?php echo $_GET['id_pro']?>" class="form-select col-5">
                    <select id="items" name="items" class="form-select col-5">
                      <option></option>
                    </select>
                    <br>
                    <label class="form-label col-2 offset-3">QTY / Hari:</label>
                    <input type="number" id="qty" name="qty" class="form-select col-3">
                    <br>
                  <div class="button col-5 offset-3">
                    <button class="btn btn-success" type="submit">Tambah Data</button>
                    <br>
                  </div>
              </form>
          </div>
          <br><br>
          <div class="content-data">
          <div class="card shadow mb-4 col-12" style="float: left;">
            <div class="card-header py-3">
              <!--tabs tabel-->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" style="font-size: .8rem;" id="home-tab" data-toggle="tab" href="#bb" role="tab" aria-controls="bb" aria-selected="true">Biaya Bahan Baku Standar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="profile-tab" data-toggle="tab" href="#bk" role="tab" aria-controls="bk" aria-selected="false">Biaya Tenaga kerja Langsung Standar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="contact-tab" data-toggle="tab" href="#bopv" role="tab" aria-controls="bopv" aria-selected="false">BOP Variabel Standar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="contact-tab" data-toggle="tab" href="#bopt" role="tab" aria-controls="bopt" aria-selected="false">BOP Tetap Standar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" style="font-size: .8rem;" id="contact-tab" data-toggle="tab" href="#custom" role="tab" aria-controls="custom" aria-selected="false">Biaya Custom</a>
                    </li>
                </ul>
              <!--akhir tabs tabel-->
            </div>
             <div class="card-body tab-content col-12" id="myTabContent">
                <div class="table-responsive tab-pane fade show active" id="bb">
                    <div class="table-bahanbaku col-8" style="float: left">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                            <th>Action</th> 
                        </tr>
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'select * from ( SELECT hs.id as idstandar,p.id_bb_standar,p.nama_bb_standar,p.satuan_bb_standar,p.harga_bb_standar,"Bahan Baku" as kategori,hs.qty,hs.total FROM hpp_standart hs 
                                join biaya_bahan_baku_standar p on p.id_bb_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 1 and ps.id =   '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama_bb_standar'];?></td>
                                      <td><?php echo $row['satuan_bb_standar'];?></td>
                                      <td><?php echo number_format($row['harga_bb_standar']);?></td>
                                      <td><?php echo $row['qty'];?></td>
                                      <td><?php echo number_format($row['total']);?></td>
                                       <td>
                                           <a class="btn btn-warning" href="update_standart.php?idbk=<?php echo $row['id_bb_standar'];?>&qty=<?php echo $row['qty'];?>&kat=1&id=<?php echo $_GET['id']?>">Edit</a>
                                          <!--<br>-->
                                          <!--<a class="btn btn-danger" href="#">Hapus-->
                                      </td>  
                        <!-- Modal -->
                          <!--akhir modal-->
                          <?php }?>
                          </tr>            
                      <!-- Modal -->
                        <!--akhir modal-->
                    </tbody>
                </table>
                </div>
                    <div class="estimasi-bb" style="margin-top: 7%">
                <table class="table table-bordered col-4" style="margin-top: 15px" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Estimasi</th>
                            <th>Estimasi QTY</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $sqles ='select * from ( 
                                    SELECT hs.id,ba.nama_bb_standar,ba.harga_bb_standar,hs.harga,"bahan baku" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                    join pesanan ps on ps.id = hs.id_pesanan left join biaya_bahan_baku_standar ba on ba.id_bb_standar = hs.id_rincian
                                    where hs.kategori = 1 and ps.id = (select id from pesanan 
                                    where panjang >= (SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                    and lebar >= (SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                    and tinggi >= (SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                    ORDER BY ABS(panjang-(SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                    ABS(ps.lebar-(SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                    ABS(ps.tinggi-(SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) 
                                    LIMIT 1)) hasil;';
                            
                            
                            
                        $queryes = mysqli_query($koneksi, $sqles);
//              $hapus = mysqli_query($koneksi, "delete from biaya_bahan_baku_aktual where id_pesanan=".$id_p."");
                        while ($rowes = mysqli_fetch_array($queryes)){
                            echo '<td>'.$rowes['nama_bb_standar'].'</td>
                                  <td>'.$rowes['qty'].'</td>';
                        }
                          ?>
                        </tr>
                    </tbody>
                    
                </table>
                </div>
              </div>                 
                 <!--awal modal bb-->
                 <!--akhir modal bb-->
              <div class="table-responsive tab-pane fade" id="bk">
                  <div class="table-pegawai col-8" style="float: left">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                             <th>Action</th> 
                    </thead>
                  
                    <tbody>
                      <?php 
                          $sql = 'select * from ( 
                                SELECT id_btkl_standar,p.nama_btkl_standar,p.type_btkl_standar,p.upah_btkl_standar,"Pekerja" as kategori,hs.qty,hs.total FROM hpp_standart hs 
                                join biaya_tenaga_kerja_langsung_standar p on p.id_btkl_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 2 and ps.id =   '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama_btkl_standar'];?></td>
                                      <td><?php echo $row['type_btkl_standar'];?></td>
                                      <td><?php echo number_format($row['upah_btkl_standar']);?></td>
                                      <?php ?>
                                      <td><?php echo $row['qty'];?></td>
                                      <td><?php echo number_format($row['total']);?></td>
                                      <td>
                                          <a class="btn btn-warning" href="update_standart.php?idbk=<?php echo $row['id_btkl_standar'];?>&qty=<?php echo $row['qty'];?>&kat=2&id=<?php echo $_GET['id']?>">Edit</a>
                                          <!--<br>-->
                                          <!--<a class="btn btn-danger" href="#">Hapus-->
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
                <div class="estimasi-pegawai" >
                <table class="table table-bordered col-4"  id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Estimasi</th>
                            <th>Estimasi QTY</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $sqles ='select * from ( 
                                    SELECT hs.id,p.nama_btkl_standar,p.type_btkl_standar,hs.harga,"Pekerja" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                    join biaya_tenaga_kerja_langsung_standar p on p.id_btkl_standar = hs.id_rincian
                                    join pesanan ps on ps.id = hs.id_pesanan left join biaya_bahan_baku_standar ba on ba.id_bb_standar = hs.id_rincian
                                    where hs.kategori = 2 and ps.id = (select id from pesanan 
                                    where panjang >= (SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                    and lebar >= (SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                    and tinggi >= (SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')
                                    ORDER BY ABS(panjang-(SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                    ABS(ps.lebar-(SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                    ABS(ps.tinggi-(SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) 
                                    LIMIT 1)) hasil;';
                        $queryes = mysqli_query($koneksi, $sqles);
//              $hapus = mysqli_query($koneksi, "delete from biaya_bahan_baku_aktual where id_pesanan=".$id_p."");
                        while ($rowes = mysqli_fetch_array($queryes)){
                            echo '<tr><td>'.$rowes['nama_btkl_standar'].'</td>
                                  <td>'.$rowes['qty'].'</td></tr>';
                        }
                          ?>
                        
                    </tbody>
                    
                </table>
                </div>
              </div>
              <div class="table-responsive tab-pane fade" id="bopv">
                <div class="table-overheadtetap col-8" style="float: left">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                             <th>Action</th> 
                    </thead>
                  
                    <tbody>
                        <?php 
                          $sql = 'select * from ( 

                                SELECT p.id_tetap_standar,p.nama_tetap_standar,p.harga_tetap_standar,"Overhead Tetap" as kategori,hs.qty,hs.total FROM hpp_standart hs 
                                join bop_tetap_standar p on p.id_tetap_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 3 and ps.id =  '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama_tetap_standar'];?></td>
                                      <td></td>
                                      <td><?php echo number_format($row['harga_tetap_standar']);?></td>
                                      <td><?php echo $row['qty'];?></td>
                                      <td><?php echo number_format($row['total']);?></td>
                                      <td>
                                          <a class="btn btn-warning" href="update_standart.php?idbk=<?php echo $row['id_tetap_standar'];?>&qty=<?php echo $row['qty'];?>&kat=3&id=<?php echo $_GET['id']?>">Edit</a>
                                          <!--<br>-->
                                          <!--<a class="btn btn-danger" href="#">Hapus-->
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
                <div class="estimasi-overheadtetap">
                <table class="table table-bordered col-4"  id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Estimasi</th>
                            <th>Estimasi QTY</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $sqles ='select * from ( 
                                SELECT hs.id,p.nama_tetap_standar,hs.harga,"Pekerja" as kategori,hs.qty,hs.total,hs.id_pesanan
                                FROM hpp_actual hs 
                                join bop_tetap_standar p on p.id_tetap_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan left join biaya_bahan_baku_standar ba on ba.id_bb_standar = hs.id_rincian
                                where hs.kategori = 3 and ps.id = (select id from pesanan 
                                where panjang >= (SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                and lebar >= (SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                and tinggi >= (SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')'
                                    . 'ORDER BY ABS(panjang-(SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                    ABS(ps.lebar-(SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                    ABS(ps.tinggi-(SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) 
                                    LIMIT 1)) hasil;';
                        $queryes = mysqli_query($koneksi, $sqles);
//              $hapus = mysqli_query($koneksi, "delete from biaya_bahan_baku_aktual where id_pesanan=".$id_p."");
                        while ($rowes = mysqli_fetch_array($queryes)){
                            echo '<tr><td>'.$rowes['nama_tetap_standar'].'</td>
                                  <td>'.$rowes['qty'].'</td></tr>';
                        }
                          ?>
                        
                    </tbody>
                    
                </table>
              </div>
              </div>
              <div class="table-responsive tab-pane fade" id="bopt">
               <div class="table-overheadvariabel col-8" style="float: left">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                             <th>Action</th> 
                    </thead>
                  
                    <tbody>
                        <?php 
                          $sql = 'select * from ( 
                                SELECT p.id_variabel_standar,p.nama_variabel_standar,p.satuan_variabel_standar,p.harga_variabel_standar,"Biaya Overhead Variable" as kategori,hs.qty,hs.total FROM hpp_standart hs 
                                join bop_variabel_standar p on p.id_variabel_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 4 and ps.id = '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama_variabel_standar'];?></td>
                                      <td><?php echo $row['satuan_variabel_standar'];?></td>
                                      <td><?php echo number_format($row['harga_variabel_standar']);?></td>
                                      <td><?php echo $row['qty'];?></td>
                                      <td><?php echo number_format($row['total']);?></td>
                                      <td>
                                          <a class="btn btn-warning" href="update_standart.php?idbk=<?php echo $row['id_variabel_standar'];?>&qty=<?php echo $row['qty'];?>&kat=4&id=<?php echo $_GET['id']?>">Edit</a>
                                          <!--<br>-->
                                          <!--<a class="btn btn-danger" href="#">Hapus-->
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
                <div class="estimasi-overheadvariabel">
                <table class="table table-bordered col-4"  id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Estimasi</th>
                            <th>Estimasi QTY</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $sqles ='select * from ( 
                                SELECT hs.id,p.nama_variabel_standar,hs.harga,"Pekerja" as kategori,hs.qty,hs.total,hs.id_pesanan
                                FROM hpp_actual hs 
                                join bop_variabel_standar p on p.id_variabel_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan left join biaya_bahan_baku_standar ba on ba.id_bb_standar = hs.id_rincian
                                where hs.kategori = 4 and ps.id = (select id from pesanan 
                                where panjang >= (SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                and lebar >= (SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                and tinggi >= (SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')'
                                . 'ORDER BY ABS(panjang-(SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                ABS(ps.lebar-(SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                ABS(ps.tinggi-(SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) 
                                LIMIT 1)) hasil;';
                        $queryes = mysqli_query($koneksi, $sqles);
//              $hapus = mysqli_query($koneksi, "delete from biaya_bahan_baku_aktual where id_pesanan=".$id_p."");
                        while ($rowes = mysqli_fetch_array($queryes)){
                            echo '<tr><td>'.$rowes['nama_variabel_standar'].'</td>
                                  <td>'.$rowes['qty'].'</td></tr>';
                        }
                          ?>
                        
                    </tbody>
                    
                </table>
              </div>
                </div>
              <div class="table-responsive tab-pane fade" id="custom">
               <div class="table-custom col-8" style="float: left">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Keterangan</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>QTY</th>
                            <th>Total</th>
                             <th>Action</th> 
                    </thead>
                  
                    <tbody>
                       <?php 
                          $sql = 'select * from ( 
                                SELECT p.id_custom_standar,p.nama_custom_standar,p.satuan_custom_standar,p.harga_custom_standar,"Custom" as kategori,hs.qty,hs.total FROM hpp_standart hs 
                                join custom_standar p on p.id_custom_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 5 and ps.id = '.$_GET['id'].' ) hasil -- group by kategori asc';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
                                 ?>
                                  <tr>
                                      <td><?php echo $row['nama_custom_standar'];?></td>
                                      <td><?php echo $row['satuan_custom_standar'];?></td>
                                      <td><?php echo number_format($row['harga_custom_standar']);?></td>
                                      <td><?php echo $row['qty'];?></td>
                                      <td><?php echo number_format($row['total']);?></td>
                                      <td>
                                          <a class="btn btn-warning" href="update_standart.php?idbk=<?php echo $row['id_custom_standar'];?>&qty=<?php echo $row['qty'];?>&kat=5&id=<?php echo $_GET['id']?>">Edit</a>
                                          <!--<br>-->
                                          <!--<a class="btn btn-danger" href="#">Hapus-->
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
                <div class="estimasi-custom">
                <table class="table table-bordered col-4"  id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Estimasi</th>
                            <th>Estimasi QTY</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $sqles ='select * from ( 
                                SELECT hs.id,p.nama_custom_standar,hs.harga,"Pekerja" as kategori,hs.qty,hs.total,hs.id_pesanan
                                FROM hpp_actual hs 
                                join custom_standar p on p.id_custom_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan left join biaya_bahan_baku_standar ba on ba.id_bb_standar = hs.id_rincian
                                where hs.kategori = 5 and ps.id = (select id from pesanan 
                                where panjang >= (SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                and lebar >= (SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].') 
                                and tinggi >= (SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')'
                                . 'ORDER BY ABS(panjang-(SELECT panjang from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                ABS(ps.lebar-(SELECT lebar from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) , 
                                ABS(ps.tinggi-(SELECT tinggi from pesanan WHERE id_kategoriproduk='.$_GET['id_pro'].' and id='.$_GET['id'].')) 
                                LIMIT 1)) hasil;';
                        $queryes = mysqli_query($koneksi, $sqles);
//              $hapus = mysqli_query($koneksi, "delete from biaya_bahan_baku_aktual where id_pesanan=".$id_p."");
                        while ($rowes = mysqli_fetch_array($queryes)){
                            echo '<tr><td>'.$rowes['nama_custom_standar'].'</td>
                                  <td>'.$rowes['qty'].'</td></tr>';
                        }
                          ?>
                        
                    </tbody>
                    
                </table>
              </div>
              </div>
            </div>



        </div>
        <!-- /.container-fluid -->
          </div>

      </div>
      <!-- End of Main Content -->


<?php include '_partial/footer.php'?>

  