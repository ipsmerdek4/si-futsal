<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>


    
    <style>
        @page{
            margin:30px;
        }
        .table{
             
            width:100%;
            border-collapse: collapse;
            text-align: center;
            font-size: 12px;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 60px;

        }
        .table td, .table th {
        border: 1px solid #A0A0A0;
        padding: 8px;
        }
        .table th { 
            background-color: #545454; 
            color: white;
            font-size: 13px;


        }
        .table tr:nth-child(even){background-color: #f2f2f2;}
        .img-header{    
            width: 100px;
            float: left;
            padding : 0 0 0 90px;
        }
        
        .header-cetak-transaksi{  
            text-align: center;
            font-size: 18px;
            width:400px; 
            float: left;
            padding : 5px 0 0 0;
        }
        .hr-cetak-transaksi{
            margin-top:-5px;
            clear:both;
        }
        .h4-text-title{
            text-align: center;
            margin: 10px 0 10px 0;
            letter-spacing: 1px;
        }
        .row3{
            width:150px;
            margin:auto;
        }
        .row5{
            width:100px;
            margin:auto;
        }
        .row7{
            width:150px;
            margin:auto;
        }
        .rowt2{
            width:150px;  
            font-weight: bold;
        }
        

    </style>




</head>
<body>

 <div class="img-header">
    <img src="<?=base_url()?>/img/logo1.gif" alt="SI-FUTSAL LOGO" style="width:100%;" > 
 </div>
<h1 class="header-cetak-transaksi">(SI-FUTSAL) SISTEM INFORMASI PENJADWALAN PENYEWAAN LAPANGAN FUTSAL</h1>
<hr class="hr-cetak-transaksi">
<h4 class="h4-text-title"  >Laporan Transaksi Penyewaan Lapangan</h4>
<h4 class="h4-text-title"  >Tanggal : <?=$tgl?></h4>

<table class="table">  
    <thead>
        <tr>
            <th rowspan="2">No</th>  
            <th >Kode Transaksi</th> 
            <th >Lapangan</th> 
            <th >Waktu Mulai</th>
            <th >Lama Bermain</th>
            <th >Penambahan/<br>Pengembalian</th>  
        </tr>
        <tr>
            
            <th colspan="2">Nama Tim/<br>Perwakilan</th> 
            <th>Pembayaran<br>awal</th>  
            <th>Harga</th>
            <th>Total<br>Harga</th>
        </tr>
    </thead> 
    <tbody> 
        <?php $no=0; $shareharga = 0;
        foreach ($dataHistori as $item): $no++; 
            if ($item->booking_status > 2) { 
        ?>  
            <tr> 
                <td class="row1" rowspan="2"> <?=$no?></td>
                <td > <b><?=$item->kode_transaksi?></b></td> 
                <td > <b><?=$item->booking_lapangan?></b></td> 
                <td > <b><?=$item->booking_start?> Wita</b> </td>
                <td > <b><?=$item->booking_play?> Jam </b> </td>
                <td class="row4"> 
                <?php
                    if ($item->booking_status == 5) {
                        if ($item->new_total_harga > $item->total_harga) {
                            $newhargaya = $item->new_total_harga - $item->total_harga;
                            echo "<b style='color:green'>Rp " . number_format($newhargaya,2,',','.')."</b>";
                        }elseif ($item->new_total_harga < $item->total_harga) {
                            $newhargaya = $item->total_harga - $item->new_total_harga;
                            echo "<b style='color:red'>- Rp " . number_format($newhargaya,2,',','.')."</b>";
                        }else{
                            echo "<b >Rp " . number_format(0,2,',','.')."</b>";
                        } 
                    }else{
                        echo "<b >Rp " . number_format(0,2,',','.')."</b>";
                    }

                ?> 
                </td>
            </tr>
            <tr> 
                <td colspan="2"><b><?=$item->tim?>/<?=$item->firstname?></b></td>
                <td >   
                    <?php
                        $setengahharga = ($item->total_harga*50)/100;  
                        echo "<b style='color:blue'>Rp " . number_format($setengahharga,2,',','.')."</b>"
                    ?> 
                </td>
                <td>
                    <?="<b style='color:blue'>Rp " . number_format($item->total_harga,2,',','.')."</b>"?>
                </td>
                <td class="row6">
                    <?php
                        if ($item->booking_status == 5) {
                             
                            if ($item->new_total_harga > $item->total_harga) {
                                $newhargaya = $item->total_harga + ($item->new_total_harga - $item->total_harga);
                                $shareharga += $newhargaya;
                                echo "<b style='color:green'>Rp " . number_format($newhargaya,2,',','.').'</b>'; 
                            }elseif ($item->new_total_harga < $item->total_harga) {
                                $newhargaya = $item->total_harga - ($item->total_harga - $item->new_total_harga);
                                $shareharga += $newhargaya; 
                                echo    "<b style='color:red'>"
                                        ."Rp " . number_format($newhargaya,2,',','.')
                                        ."</b>";
                            }else{
                                echo "<b style='color:blue'>Rp " . number_format($item->total_harga,2,',','.')."</b>"; 
                                $shareharga += $item->total_harga;

                            }
                           
                        }else{
                            echo "<b style='color:blue'>Rp " . number_format($item->total_harga,2,',','.')."</b>"; 
                            $shareharga += $item->total_harga;
                        }

                    ?>
                </td>
            </tr>
        
        <?php      
            }
         endforeach; ?>  

         <tr>
             <td colspan="5"  style="text-align: right;padding-right:10px;background-color: #545454;color: white;"><b> TOTAL: </b></td>
             <td style='background-color: #545454;color: white;'><?="<b>Rp " . number_format($shareharga,2,',','.')."</b>"; ?></td>
         </tr>

    </tbody>
</table>

    

<script type="text/php">
        if ( isset($pdf) ) {
            // OLD 
            // $font = Font_Metrics::get_font("helvetica", "bold");
            // $pdf->page_text(72, 18, "{PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(255,0,0));
            // v.0.7.0 and greater
            $x = 250;
            $y = 810;
            $text = "SI-FUTSAL ({PAGE_NUM} dari {PAGE_COUNT}) Halaman";
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "bold");
            $size = 6;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</body>
</html>