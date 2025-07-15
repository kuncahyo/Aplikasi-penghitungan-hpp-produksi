<!DOCTYPE html>
<html>
<head>
    <link href="css/design-report.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
        <?php
        include 'koneksi1.php';
        if (isset($_POST['simpanact'])) {
              #################################
    $id_p = $_POST['id_p'];
    ?>
<div class="container">
<div class="row">
<div class="col-md-9 col-md-offset-1 col-sm-8 col-sm-offset-2 col-xs-12 brandSection">
<div class="row">
<div class="col-md-12 col-sm-12 header">
<div class="col-md-12 col-sm-12 headerLeft">
<h1>Pembelian Bahan Baku</h1>
</div>
</div>
<div class="col-md-12 col-sm-12 content">
    <div class="col-md-2 col-sm-1"><p>KODE PESAN</p></div>
    <div class="col-md-1 col-sm-1"><p>:</p></div>
    <div class="col-md-3 col-sm-1"><p><strong> <?php  
    $sql = 'SELECT pesanan.*,COALESCE(sum(hs.total),0)+((COALESCE(sum(hs.total),0)*pesanan.laba)/100) as harga_jual,pelanggan.nama_pelanggan as pelanggan, COALESCE(sum(hs.total),0) as totalhppa 
                            FROM pesanan 
                            join pelanggan on pesanan.id_pelanggan = pelanggan.id_pelanggan
                            left join hpp_actual hs on hs.id_pesanan = pesanan.id where pesanan.id='.$id_p.' group by pesanan.id';
                          $query = mysqli_query($koneksi, $sql);
                             while ($row = mysqli_fetch_array($query))
                                {echo 'PA'.$row['id'];?>
            </strong></p></div>
    <div class="col-md-2 col-sm-1"><p>Nama Produk</p></div>
     <div class="col-md-1 col-sm-1"><p>:</p></div>
    <div class="col-md-3 col-sm-1"><p><strong> <?php  
                                echo $row['nama'];?>
            </strong></p></div>
     <div class="col-md-2 col-sm-1"><p>Nama Pelanggan</p></div>
     <div class="col-md-1 col-sm-1"><p>:</p></div>
    <div class="col-md-3 col-sm-1"><p><strong> <?php  
                                echo $row['pelanggan'];?>
            </strong></p></div>
     <div class="col-md-2 col-sm-1"><p>Tanggal Pesan</p></div>
     <div class="col-md-1 col-sm-1"><p>:</p></div>
    <div class="col-md-3 col-sm-1"><p><strong> <?php  
                                echo $row['tgl_pesanan'];?>
            </strong></p></div>
        <div class="col-md-2 col-sm-1"><p></p></div>
        <div class="col-md-1 col-sm-1"><p></p></div>
        <div class="col-md-3 col-sm-1"><p><strong></strong></p></div>
        
        <div class="col-md-2 col-sm-1"><p>Tanggal Tempo</p></div>
     <div class="col-md-1 col-sm-1"><p>:</p></div>
    <div class="col-md-3 col-sm-1"><p><strong> <?php  
                                echo $row['tgl_jatuhtempo'];?>
                <?php } ?>
                   <!--.$_GET['id']-->
                </div>
<div class="col-md-12 col-sm-12 tableSection">
    <br>
    <h1>Biaya Bahan Baku Standar</h1>
<table class="table text-center">
<thead>
<?php  
    $sqlbbs = 'select * from ( SELECT hs.id,p.nama_bb_standar,p.satuan_bb_standar,hs.harga,"Bahan Baku" as kategori,
                                hs.qty,hs.total FROM hpp_actual hs 
                                join biaya_bahan_baku_standar p on p.id_bb_standar = hs.id_rincian
                                join pesanan ps on ps.id = hs.id_pesanan
                                where hs.kategori = 1 and ps.id = '.$id_p.') hasil -- group by kategori asc';
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
<?php } 
        }
?>
</tbody>
</table>
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