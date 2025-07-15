<!DOCTYPE html>
<html>
<head>
    <link href="css/design-report.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
        <?php
        include 'koneksi1.php';
    ?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 col-md col-sm-12 col-sm col-xs-12 brandSection">
<div class="row">
<div class="col-md-12 col-sm-12 header">
<div class="col-md-12 col-sm-12 headerLeft">
<h1>Laporan Evaluasi Harga Pokok Produk </h1>
</div>
</div>
<div class="col-md-12 col-sm-12 content">
    <?php
        $sqlevals='select ps.id, SUM(hs.total) as hppstan from hpp_standart hs JOIN pesanan ps on hs.id_pesanan=ps.id WHERE ps.id='.$_GET['id'].';';
    $standart=0;
    $actual=0;
    $queryevals = mysqli_query($koneksi, $sqlevals);
                             while ($rowe = mysqli_fetch_array($queryevals))
                                {
                                  $standart = $standart+$rowe['hppstan'];
                                 number_format($rowe['hppstan']);
                                };
    $sqlevala='select ps.id, SUM(hs.total) as hppact from hpp_actual hs JOIN pesanan ps on hs.id_pesanan=ps.id WHERE ps.id='.$_GET['id'].';';
    $queryevala = mysqli_query($koneksi, $sqlevala);
                             while ($rowk = mysqli_fetch_array($queryevala))
                                {
                                  $actual = $actual+$rowk['hppact'];
                                 number_format($rowk['hppact']);
                                };
                                 
    $sql = 'SELECT pesanan.*,COALESCE(sum(hs.total),0)+((COALESCE(sum(hs.total),0)*pesanan.laba)/100) as harga_jual,pelanggan.nama_pelanggan as pelanggan 
                            FROM pesanan 
                            join pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan
                            left join hpp_standart hs on hs.id_pesanan = pesanan.id where pesanan.id='.$_GET['id'].' group by pesanan.id';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {
    ?>
    <div class="isijudul1" >
        <row class="col-md-12 col-sm-12">
        <div class="col-md-2 col-sm-2" style="float: left"><p>KODE PESAN</p></div>
        <div class="col-md-1 col-sm-1" style="float: left; text-align:center"><p>:</p></div>
        <div class="col-md-2 col-sm-2"style="float: left;"><p><strong>
        <?php echo '  EP'.$row['id'];?></strong></p></div>
        <div class="col-md-1 col-sm-1"></div>
        
        <div class="col-md-2 col-sm-2" style="float: left;"><p>Nama Produk</p></div>
        <div class="col-md-1 col-sm-1" style="float: left"><p> :</p></div>
        <div class="col-md-2 col-sm-2"style="float: left;"><p><strong> 
        <?php echo $row['nama'];?></strong></p></div>
        <div class="col-md-1 col-sm-1"></div>
        </row>
    </div>
    <div class="isijudul2" >
        <row class="col-md-12 col-sm-12">
        <div class="col-md-2 col-sm-2" style="float: left"><p>Nama Pelanggan</p></div>
        <div class="col-md-1 col-sm-1" style="float: left"><p>:</p></div>
        <div class="col-md-2 col-sm-2" style="float: left"><p><strong> 
        <?php echo $row['pelanggan'];?></strong></p></div>
        <div class="col-md-1 col-sm-1"></div>

        <div class="col-md-2 col-sm-2" style="float: left"><p>Tanggal Pesan</p></div>
        <div class="col-md-1 col-sm-1" style="float: left"><p>:</p></div>
        <div class="col-md-2 col-sm-2" style="float: left"><p><strong> 
        <?php echo $row['tgl_pesanan'];?></strong></p></div>
        <div class="col-md-1 col-sm-1"style="float: left"></div>
        </row>
    </div>
    <div class="isijudul2" >
        <row class="col-md-12 col-sm-12">
        <div class="col-md-2 col-sm-2"><p></p></div>
        <div class="col-md-1 col-sm-1"><p></p></div>
        <div class="col-md-3 col-sm-3"><p><strong></strong></p></div>
        
        <div class="col-md-2 col-sm-2"style="float: left"><p>Tanggal Tempo</p></div>
        <div class="col-md-1 col-sm-1" style="float: left"><p>:</p></div>
        <div class="col-md-3 col-sm-2" style="float: left;"><p><strong> 
            <?php echo $row['tgl_jatuhtempo'];?></strong></p></div>
        </row>
    </div>
     
     <div class="col-md-5 col-sm-1 "></div><?php } ?>
                <div class="col-md-6 col-sm-6"><br><strong><span style="font-size: 14px; color: black;">Total Varian: 
                    <?php
                    echo 'Rp.'.number_format($standart-$actual)?></span></strong></div>
                
     
                   <!--.$_GET['id']-->
<!--awal kiri-->   
<div class="row col-md-12 col-sm-12" style="float:left">
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
                <br>
                <h1>Biaya Bahan Baku Standar</h1>
            <table class="table text-center">
            <thead>
            <?php  
                $totalbahanbakustandart = 0;
                $sqlbbs = 'select * from ( SELECT p.nama_bb_standar,p.satuan_bb_standar,p.harga_bb_standar,"Bahan Baku" as kategori,hs.qty,hs.total FROM hpp_standart hs 
                                join biaya_bahan_baku_standar p on p.id_bb_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 1 and ps.id= '.$_GET['id'].' ) hasil -- group by kategori asc';
                                      $querybbs = mysqli_query($koneksi, $sqlbbs);
                                         while ($rowbb = mysqli_fetch_array($querybbs))
                                            {?>    
            <tr class="tableHead">
            <th >Nama</th>
            <th style="width:30px;">Qty</th>
            <th style="width:100px;">Satuan</th>
            <th style="width:100px;">Biaya</th>
            <th style="width:100px;text-align:center;">TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <tr>
                <td><?php echo $rowbb['nama_bb_standar'];?></td>
                <td><?php echo $rowbb['qty'];?></td>
                <td><?php echo $rowbb['satuan_bb_standar'];?></td>
                <td><?php echo $rowbb['harga_bb_standar'];?></td>
                <td><?php echo $rowbb['total'];?></td>                
            </tr>
            <?php $totalbahanbakustandart = $totalbahanbakustandart + $rowbb['total'];} ?>
            </tbody>
            </table>
            </div>
</div>
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
        <br>
        <h1>Biaya Bahan Baku Aktual</h1>
    <table class="table text-center">
    <thead>
    <?php  
        $totalbahanbakuactual = 0;
        $sqlbbs = 'select * from ( SELECT hs.id,p.nama_bb_standar,p.satuan_bb_standar,hs.harga,"Bahan Baku" as kategori,
                                hs.qty,hs.total FROM hpp_actual hs 
                                join biaya_bahan_baku_standar p on p.id_bb_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 1 and ps.id = '.$_GET['id'].') hasil -- group by kategori asc';
                              $querybbs = mysqli_query($koneksi, $sqlbbs);
                                 while ($rowbb = mysqli_fetch_array($querybbs))
                                    {?>    
    <tr class="tableHead">
    <th >Nama</th>
    <th style="width:30px;">Qty</th>
    <th style="width:100px;">Satuan</th>
    <th style="width:100px;">Biaya</th>
    <th style="width:100px;text-align:center;">TOTAL</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <tr>
        <td><?php echo $rowbb['nama_bb_standar'];?></td>
        <td><?php echo $rowbb['qty'];?></td>
        <td><?php echo $rowbb['satuan_bb_standar'];?></td>
        <td><?php echo $rowbb['harga'];?></td>
        <td><?php echo $rowbb['total'];?></td>                
    </tr>
    <?php $totalbahanbakuactual = $totalbahanbakuactual + $rowbb['total'];} ?>
    </tbody>
    </table>
    </div>
</div>    
    <div class='lokasivariant' style="text-align: center;">
    <label><div class="varianbahanbaku">Variant Bahan Baku:</div></label>
    <label><div class="isivarianbahanbaku" style="background-color: yellow"><u><?php echo $totalbahanbakustandart-$totalbahanbakuactual; ?></u></div></label>
    </div>
</div>
<!--akhir kiri-->
<!--awal 2-->
<div class="row col-md-12 col-sm-12" style="float:left">
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
        <br>
        <h1>Biaya Tenaga Kerja Langsung Standar</h1>
        <table class="table text-center">
    <thead>
    <?php  
        $totalpekerjastandart = 0;
        $sqlbtkls = 'select * from ( 
                                SELECT p.nama_btkl_standar,p.type_btkl_standar,p.upah_btkl_standar,"Pekerja" as kategori,hs.qty,hs.total FROM hpp_standart hs 
                                join biaya_tenaga_kerja_langsung_standar p on p.id_btkl_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 2 and ps.id= '.$_GET['id'].' ) hasil -- group by kategori asc';
                              $querybtkls = mysqli_query($koneksi, $sqlbtkls);
                                 ?>    
    <tr class="tableHead">
    <th style="text-align:center;">Nama</th>
    <th style="text-align:center;">TOTAL</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <?php while ($rowbtkls = mysqli_fetch_array($querybtkls))
                                    {?>
        <td><?php echo $rowbtkls['nama_btkl_standar'];?></td>
        <td style="text-align:center;"><?php echo $rowbtkls['total'];?></td>                
    </tr>
    <?php $totalpekerjastandart = $totalpekerjastandart + $rowbtkls['total']; } ?>
    </tbody>
    </table>
    </div>
</div>
    
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
<br>
        <h1>Biaya Tenaga Kerja Langsung Aktual</h1>
    <table class="table text-center">
    <thead>
    <?php  
        $totalpekerjaactual = 0;
        $sqlbtkls ='select * from ( 
                                SELECT hs.id,p.nama_btkl_standar,p.type_btkl_standar,hs.harga,"Pekerja" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join biaya_tenaga_kerja_langsung_standar p on p.id_btkl_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 2 and ps.id ='.$_GET['id'].') hasil -- group by kategori asc';
                              $querybtkls = mysqli_query($koneksi, $sqlbtkls);
                                 ?>    
    <tr class="tableHead">
    <th style="text-align:center;">Nama</th>
    <th style="text-align:center;">TOTAL</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php while ($rowbtkls = mysqli_fetch_array($querybtkls))
                                    {?>
        <td><?php echo $rowbtkls['nama_btkl_standar'];?></td>
        <td style="text-align:center;"><?php echo $rowbtkls['total'];?></td>                
    </tr>
    <?php $totalpekerjaactual = $totalpekerjaactual + $rowbtkls['total'];} ?>
    </tbody>
    </table>
    </div>
</div>
    <div class='lokasivariant' style="text-align: center;">
    <label><div class="varianbtkl">Variant Biaya Tenaga Kerja Langsung:</div></label>
    <label><div class="isivarianbtkl" style="background-color: yellow"><u><?php echo $totalpekerjastandart-$totalpekerjaactual; ?></u></div></label>
    </div>
</div>

<!--awal 3-->
<div class="row col-md-12 col-sm-12" style="float:left">
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
<br>
        <h1>Biaya Overhead Pabrik Tetap Standar</h1>
    <table class="table text-center">
    <thead>

    <tr class="tableHead">
    <th >Nama</th>
    <th style="width:30px;">Qty</th>
    <th style="width:100px;">Biaya</th>
    <th style="width:100px;text-align:center;">TOTAL</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <tr>
        <?php  
        $totaloverheadvariablestandart = 0 ;
        $sqlbopvs ='select * from ( SELECT p.nama_tetap_standar,p.harga_tetap_standar,"Overhead Tetap" as kategori,hs.qty,hs.harga,hs.total FROM hpp_standart hs 
                                join bop_tetap_standar p on p.id_tetap_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 3 and ps.id = '.$_GET['id'].' ) hasil -- group by kategori asc';
                              $querybopvs = mysqli_query($koneksi, $sqlbopvs);
                                 while ($rowbopvs = mysqli_fetch_array($querybopvs))
                                    {?>    
        <td><?php echo $rowbopvs['nama_tetap_standar'];?></td>
        <td><?php echo $rowbopvs['qty'];?></td>
        <td><?php echo $rowbopvs['harga_tetap_standar'];?></td>
        <td><?php echo $rowbopvs['total'];?></td>                
    </tr>
    <?php $totaloverheadvariablestandart = $totaloverheadvariablestandart + $rowbopvs['total'];} ?>
    </tbody>
    </table>
    </div>
</div>
    
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
<br>
        <h1>Biaya Overhead Pabrik Tetap Aktual</h1>
    <table class="table text-center">
    <thead>

    <tr class="tableHead">
    <th >Nama</th>
    <th style="width:30px;">Qty</th>
    <th style="width:100px;">Biaya</th>
    <th style="width:100px;text-align:center;">TOTAL</th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <tr>
        <?php  
        $totaloverheadvariableactual = 0;
        $sqlbopvs ='select * from ( 

                                SELECT hs.id,p.nama_tetap_standar,hs.harga,"Overhead Variable" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join bop_tetap_standar p on p.id_tetap_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 3 and ps.id ='.$_GET['id'].') hasil -- group by kategori asc';
                              $querybopvs = mysqli_query($koneksi, $sqlbopvs);
                                 while ($rowbopvs = mysqli_fetch_array($querybopvs))
                                    {?>    
        <td><?php echo $rowbopvs['nama_tetap_standar'];?></td>
        <td><?php echo $rowbopvs['qty'];?></td>
        <td><?php echo $rowbopvs['harga'];?></td>
        <td><?php echo $rowbopvs['total'];?></td>                
    </tr>
    <?php $totaloverheadvariableactual = $totaloverheadvariableactual + $rowbopvs['total'];} ?>
    </tbody>
    </table>
    </div>
</div>
    <div class='lokasivariant' style="text-align: center;">
    <label><div class="varianboptetap">Variant Biaya Overhead Pabrik Tetap:</div></label>
    <label><div class="isivarianboptetap" style="background-color: yellow"><u><?php  echo $totaloverheadvariablestandart - $totaloverheadvariableactual ; ?></u></div></label>
    </div>
</div>

<!--awal 4-->
<div class="row col-md-12 col-sm-12" style="float:left">
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
<br>
        <h1>Biaya Overhead Pabrik Variabel Standar</h1>
    <table class="table text-center">
    <thead>
    <?php  
        $totaloverheadpabrikstandart = 0;
        $sqlbopt ='select * from ( 
                                SELECT p.nama_variabel_standar,hs.total FROM hpp_standart hs 
                                join bop_variabel_standar p on p.id_variabel_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 4 and ps.id= '.$_GET['id'].' ) hasil -- group by kategori asc';
                              $querybopt = mysqli_query($koneksi, $sqlbopt);
                                 ?>    
    <tr class="tableHead">
    <th style="text-align:center;">Nama</th>
    <th style="text-align:center;">TOTAL</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php while ($rowbopt = mysqli_fetch_array($querybopt))
                                    {?>
        <td><?php echo $rowbopt['nama_variabel_standar'];?></td>
        <td style="text-align:center;"><?php echo $rowbopt['total'];?></td>                
    </tr>
    <?php $totaloverheadpabrikstandart = $totaloverheadpabrikstandart + $rowbopt['total']; } ?>
    </tbody>
    </table>
    </div>
</div>
    
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
<br>
        <h1>Biaya Overhead Pabrik Variabel Aktual</h1>
    <table class="table text-center">
    <thead>
    <?php  
        $totaloverheadpabrikactual = 0;
        $sqlbopt = 'select * from ( 
                                SELECT hs.id,p.nama_variabel_standar,p.satuan_variabel_standar,hs.harga,"Biaya Overhead Variable" as kategori,hs.qty,hs.total FROM hpp_actual hs 
                                join bop_variabel_standar p on p.id_variabel_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 4 and ps.id ='.$_GET['id'].') hasil -- group by kategori asc';
                              $querybopt = mysqli_query($koneksi, $sqlbopt);
                                 ?>    
    <tr class="tableHead">
    <th style="text-align:center;">Nama</th>
    <th style="text-align:center;">TOTAL</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <?php while ($rowbopt = mysqli_fetch_array($querybopt))
                                    {?>
        <td><?php echo $rowbopt['nama_variabel_standar'];?></td>
        <td style="text-align:center;"><?php echo $rowbopt['total'];?></td>                
    </tr>
    <?php $totaloverheadpabrikactual = $totaloverheadpabrikactual + $rowbopt['total'];} ?>
    </tbody>
    </table>
    </div>
</div>
    <div class='lokasivariant' style="text-align: center;">
    <label><div class="varianbopvariabel">Variant Biaya Overhead Pabrik Variabel:</div></label>
    <label><div class="isivarianbopvariabel" style="background-color: yellow"><u><?php echo $totaloverheadpabrikstandart - $totaloverheadpabrikactual ; ?></u></div></label>
    </div>
</div>

<!--awal 5-->
<div class="row col-md-12 col-sm-12" style="float:left">
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
        <br>
    <h1>Biaya Custom Standar</h1>
    <table class="table text-center">
    <thead>  
    <?php  
        $totalcustomstandart = 0;
        $sqlbopt = 'select * from ( 
                                    SELECT p.nama_custom_standar,hs.total FROM hpp_standart hs 
                                    join custom_standar p on p.id_custom_standar = hs.id_rincian
                                    join pesanan ps on ps.id = hs.id_pesanan
                                    where hs.kategori = 5 and ps.id='.$_GET['id'].') hasil -- group by kategori asc';
                              $querybopt = mysqli_query($koneksi, $sqlbopt);
                                 ?>    
    <tr class="tableHead">
    <th style="text-align:center;">Nama</th>
    <th style="text-align:center;">TOTAL</th>
    </tr>
    </thead>

    <tbody>
    <?php while ($rowbopt = mysqli_fetch_array($querybopt))
                                    {?>
        <td><?php echo $rowbopt['nama_custom_standar'];?></td>
        <td style="text-align:center;"><?php echo $rowbopt['total'];?></td>                
    </tr>
    <?php $totalcustomstandart = $totalcustomstandart + $rowbopt['total'];} ?>
    </tbody>
    </table>
    </div>
</div>
    
<div class="col-md-6 col-sm-6 content" style="float:left">
    <div class="col-md-12 col-sm-12 tableSection">
        <br>
    <h1>Biaya Custom Aktual</h1>
    <table class="table text-center">
    <thead>  
    <?php  
        $totalcustomactual = 0;
        $sqlbopt ='select * from ( 
                                    SELECT p.nama_custom_standar,hs.total FROM hpp_actual hs 
                                    join custom_standar p on p.id_custom_standar = hs.id_rincian
                                    join pesanan ps on ps.id = hs.id_pesanan
                                    where hs.kategori = 5 and ps.id='.$_GET['id'].') hasil -- group by kategori asc';
                              $querybopt = mysqli_query($koneksi, $sqlbopt);
                                 ?>    
    <tr class="tableHead">
    <th style="text-align:center;">Nama</th>
    <th style="text-align:center;">TOTAL</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <?php while ($rowbopt = mysqli_fetch_array($querybopt))
                                    {?>
        <td><?php echo $rowbopt['nama_custom_standar'];?></td>
        <td style="text-align:center;"><?php echo $rowbopt['total'];?></td>                
    </tr>
    <?php $totalcustomactual = $totalcustomactual + $rowbopt['total'];} ?>
    </tbody>
    </table>
    </div>
</div>
    <div class='lokasivariant' style="text-align: center;">
    <label><div class="varianbcustom">Variant Biaya Custom:</div></label>
    <label><div class="isivariancustom" style="background-color: yellow"><u><?php echo $totalcustomstandart - $totalcustomstandart; ?></u></div></label>
    </div>
</div>

</div>
</div>
</div>
</div>
    
    <script>
		window.print();
	</script>
</body>
</html>