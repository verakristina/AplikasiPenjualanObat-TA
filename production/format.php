<?php 
function OtomatisID()
{
$querycount="SELECT COUNT(id) as LastID FROM penjualan";
$result=mysql_query($querycount) or die(mysql_error());
$row=mysql_fetch_array($result);
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

?>