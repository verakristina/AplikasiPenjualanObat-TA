<?php
session_start();
include '../koneksi.php';

$LastID = "";

function OtomatisID()
{
$querycount="SELECT COUNT(id) as LastID FROM penjualan";
$result=mysql_query($querycount) or die(mysql_error());
$row=mysql_fetch_array($result);
$LastID = $row['LastID'];
return $row['LastID'];
}
function FormatNoTrans($num) {
        $num=$num+1; switch (strlen($num))
        {    
        case 1 : $NoTrans = "Trx000000".$num; break;    
        case 2 : $NoTrans = "Trx00000".$num; break;    
        case 3 : $NoTrans = "Trx0000".$num; break;    
        case 4 : $NoTrans = "Trx000".$num; break;    
        default: $NoTrans = $num;        
        }          
        return $NoTrans;
}
date_default_timezone_set("Asia/Jakarta");

$bayar = "";
$harga_dis = "";
$nm_obat = "";
$hjual = "";

$use=$_SESSION['username'];
$kode12 = $_POST['id_kategori'];

    $disc = $_POST['diskon'];
    $qty = $_POST['jumlah_obat'];

    $tanggal        = date("y-m-d");

$f1o=mysqli_query($koneksi,"select * from obat where kode_obat='$kode12'");
while($data=mysqli_fetch_array($f1o))
 {
    $nm_obat = $data['nama_obat'];
    $hjual = $data['harga_jual'];
    $stok  = $data['stok'];



$que=mysql_query("select subtotal, count(id) as total, sum(jumlah_obat) as upqty from temp where kode_obat='$kode12'");
while($data1=mysql_fetch_array($que))
{
    $total = $data1['total'];
    $upqty = $data1['upqty'];
    
    $h_awal = $data1['subtotal'];

    $tot_qty = $qty+$upqty;
    $qtyup = $upqty+$qty;
    $sub = $hjual*$qtyup;
    @$harga_dis = (($sub*$disc)/100);
    $bayar = $sub-$harga_dis;                   
}}


$updatestok = $stok-$qty;

if ($qty <= $stok) :
    if ($total==0 ) {
        $sql = mysql_query("INSERT INTO `apotek_vera`.`temp`
            (`id`,
             `kode_obat`,
             `harga`,
             `diskon`,
             `qty`,
             `subtotal`,nama, pot)

                VALUES ('$LastID',
                        '$kode12',
                        '$hjual',
                        '$disc',
                        '$qty',
                        '$bayar', '$nm_obat' ,'$harga_dis');");
       
       $query5 = mysql_query("UPDATE tb_obat SET stok='$updatestok' WHERE kode='$kode12'");
    } else {
        $update = $qty+$upqty;
       $query4 = mysql_query("UPDATE temp SET qty='$update', subtotal='$bayar' WHERE kode_obat='$kode12' ");
       $query5 = mysql_query("UPDATE tb_obat SET stok='$updatestok' WHERE kode='$kode12'");
    //
      // $query5 = mysql_query("UPDATE barang SET stok='$upstok' WHERE kode_barang='$kode12' ");
    }else :  
    echo "<script type='text/javascript'>alert('Stok Tidak Cukup')</script>";
    
endif;

echo "<script>document.location.href='addcart.php';</script>";
 
?>