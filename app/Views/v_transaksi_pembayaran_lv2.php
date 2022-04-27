<?php
$session = session();
?>
                <div class="container-fluid">  
                    <br> 
                    <div class="row">
                        <div class="col-lg-12  ">
                             <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment_turned_in</i>
                                </div>
                                <div class="card-content card-title-spc">
                                    <h4 class="card-title title-spc">Transaksi Pembayaran</h4>
                                    <hr> 
                                       
                                    <br><br>
                                    <div class="row"  >
                                        <div class="col-md-1" style="width:90px;">
                                            <b style="" >Tanggal :</b>
                                        </div>
                                        <div class="col-md-2 date-input-jadwal"  > 
                                            <div class="form-group"> 
                                                <?php
                                                    $pecahtglnew= explode("-", $sendtgl);
                                                    $tglnew = $pecahtglnew[2].'-'.$pecahtglnew[1].'-'.$pecahtglnew[0];
                                                ?>
                                                <input type="text" id="tgl-transaksi-pembayaran" class="form-control datetimepicker" value="<?=$tglnew?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-2 date-button-jadwal"  >  
                                                <button id="btn-transaksi-pembayaran" class="btn btn-success">
                                                <i class="material-icons">view_day</i> 
                                                    Tampilkan
                                                </button> 
                                        </div>
                                    </div>  

    <style>
        .myImg{
            border: 2px solid red;
            padding: 5px;
            margin : 5px;
        }
        .myImg-sebelum{
            border: 2px solid #4caf50;
        }
    </style>


                                    <table id="transaksi_pembayaran" class="table table-striped table-no-bordered table-hover table-spc" cellspacing="0" width="100%" style="width:100%;color:#9c27b0;border-color:#9c27b0 !important;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Bukti<br>Transfer</th>
                                                <th>Kode Transaksi</th>
                                                <th>Nama Tim/<br>Perwakilan</th>
                                                <th>Waktu<br>Mulai</th>
                                                <th>Lama<br>Bermain</th>
                                                <th>Total<br>Pembayaran</th>
                                                <th>Pembayaran<br>Awal</th>
                                                <th>Status</th> 
                                                <th>Opsi</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php    foreach ($dataHistori as $v_dataHistori): 
                                                        if ($v_dataHistori->booking_status != 9) { 
                                            ?> 
                                            <tr>
                                                <td><!-- Nomerurut --></td>
                                                <td>
                                                    <?php
                                                        if ($v_dataHistori->booking_bukti != 0) { 
                                                            echo '<img class="myImg myImg-sebelum" src="'.base_url().'/uploads/bukti/'.$v_dataHistori->booking_bukti.'" alt="'.$v_dataHistori->booking_bukti.'" style="width:100%;max-width:50px">';
                                                            if ($v_dataHistori->booking_bukti_update != null) {
                                                                echo '<img class="myImg" src="'.base_url().'/uploads/bukti/'.$v_dataHistori->booking_bukti_update.'" alt="'.$v_dataHistori->booking_bukti_update.'" style="width:100%;max-width:50px">';
                                                            } 
                                                        }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" > 
                                                        <?=$v_dataHistori->kode_transaksi?> </b> 
                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" > 
                                                        <?=$v_dataHistori->tim?> 
                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" >
                                                        <i class="material-icons">access_alarm</i> 
                                                        <?=$v_dataHistori->booking_start?> 
                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" >
                                                        <i class="material-icons">access_alarm</i> 
                                                        <?=$v_dataHistori->booking_play?> Jam 
                                                    </button> 
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" >
                                                        <?="Rp " . number_format($v_dataHistori->total_harga,2,',','.')?> 
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" >
                                                        <?="Rp " . number_format(($v_dataHistori->new_total_harga - $v_dataHistori->total_harga),2,',','.')?> 
                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-xs" >
                                                        <?php
                                                            if ($v_dataHistori->booking_TOKEN == 0) {
                                                                $dp = 0;
                                                            }else{
                                                                $dp = (($v_dataHistori->total_harga*50)/100)+$v_dataHistori->kode_unix;
                                                            }
                                                        ?>
                                                        <?="Rp " . number_format($dp,2,',','.')?> 
                                                    </button> 
                                                </td>
                                                <td>
                                                    <?php 
                                                    if ($v_dataHistori->booking_status == 1) {
                                                    ?>
                                                    <button class="btn btn-warning btn-xs" >
                                                        <i class="material-icons">access_time</i> <b>Waiting ... </b> 
                                                    </button>
                                                    <?php
                                                    }elseif ($v_dataHistori->booking_status == 2) {
                                                    ?>  
                                                    <button class="btn btn-success btn-xs" >
                                                        <i class="material-icons">access_time</i> <b>Waiting ... </b> 
                                                    </button> 
                                                    <?php
                                                    }elseif ($v_dataHistori->booking_status == 3) {
                                                    ?>  
                                                    <button class="btn btn-primary btn-xs" >
                                                        <i class="material-icons">check</i> <b>Approve </b> 
                                                    </button> 
                                                    <?php
                                                    }elseif ($v_dataHistori->booking_status == 4) {
                                                    ?>  
                                                        <button class="btn btn-primary btn-xs" >
                                                            <i class="material-icons">check</i> 
                                                            <b>Lunas</b> 
                                                        </button>   
                                                    <?php
                                                    }elseif ($v_dataHistori->booking_status == 9) {
                                                    ?> 
                                                    <button class="btn btn-danger btn-xs" >
                                                        <i class="material-icons">clear</i> <b>Cancel</b> 
                                                    </button>
                                                    <?php 
                                                    } 
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        if ($v_dataHistori->booking_status == 1) {
                                                            if ($v_dataHistori->booking_bukti_update != null) {
                                                                 $nilai_bukti_update = 2;
                                                            }else{
                                                                 $nilai_bukti_update = 1;
                                                            }
                                                    ?> 
                                                        <button class="btn btn-warning btn-xs btn-konfirmasi" data-id="<?=$v_dataHistori->id_histori?>*<?=$v_dataHistori->booking_status?>*1*<?=$nilai_bukti_update?>"  data-toggle="modal" data-target="#_access_open"  >
                                                            <i class="material-icons">access_time</i> 
                                                            <b>Konfirmasi</b> 
                                                        </button>   
                                                        <button class="btn btn-danger btn-xs btn-konfirmasi" data-id="<?=$v_dataHistori->id_histori?>*<?=$v_dataHistori->booking_status?>*2"  data-toggle="modal" data-target="#_access_open"  >
                                                            <i class="material-icons">clear</i> <b>Cancel</b> 
                                                        </button>

                                                    <?php
                                                        }elseif ($v_dataHistori->booking_status == 2) {
                                                    ?>  
                                                        <button class="btn btn-success btn-xs btn-konfirmasi" data-id="<?=$v_dataHistori->id_histori?>*<?=$v_dataHistori->booking_status?>"  data-toggle="modal" data-target="#_access_open"  >
                                                            <i class="material-icons">check</i> 
                                                            <b>Approve</b> 
                                                        </button>
                                                    <?php
                                                        }elseif ($v_dataHistori->booking_status == 3) {
                                                    ?> 
                                                        <button class="btn btn-danger btn-xs btn-konfirmasi" data-id="<?=$v_dataHistori->id_histori?>*<?=$v_dataHistori->booking_status?>"  data-toggle="modal" data-target="#_access_open"  >
                                                            <i class="material-icons">check</i> 
                                                            <b>Token</b> 
                                                        </button>
                                                    <?php
                                                        }
                                                    ?>
                                                    </td>



                                            </tr> 
                                            <?php       }
                                                    endforeach; 
                                            ?> 
                                        </tbody> 
                                    </table>
 
                                   
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>
 
                <style>

               

                </style>

 
            <!-- modal peringatan -->
            <div class="modal fade" id="alert_modalX" 
                tabindex="-1" 
                aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content modal-alert-spc">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Peringatan!</h4>
                            <hr>
                        </div>
                        <div class="modal-body">    
                                <?php  echo session()->getFlashdata('pesantrs_pembayaran'); ?> 
                        </div>  
                        <hr class="hr-alert-modal">
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div> 
                    </div>
                </div>
            </div>


 

            <!-- modal -->
            <div class="modal fade" id="_access_open" 
                tabindex="-1" 
                aria-labelledby="exampleModalLabel" 
                aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content ajx_pembayaran">

                            <div class="modal-header">
                                <h5 class="modal-title text-center title-spc-ajxpembayaran" >
                                     //-----------------
                                </h5> 
                                <hr style="margin:10px 0 0 0; border-top:1px solid red">
                            </div> 
                             
                            <form id="_access_FORM" method="post" enctype="multipart/form-data">
                                <div class="modal-body"> 
                                    <div class="text-modal-spc">
                                            <h5></h5> 
                                            <input type="hidden" name="_access_val" id="_access_val" readonly>
                                            <div class="_file"></div>
                                           
                                        </div>
                                    </div>
                                    <hr class="hr-modal-spc">
                                    <div class="modal-footer text-center">  
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">  &nbsp; &nbsp; &nbsp; &nbsp;Batal   &nbsp; &nbsp; &nbsp;  </button>
                                    <button type="submit" class="btn btn-success">Lanjutkan  </button>
                                </div>
                            </form>


                    </div>
                </div>
            </div>

       
            <!-- The Modal view picture -->
            <div id="myModal" class="modal modal-picture">  
                <!-- The Close Button -->
                <span class="closeX">&times;</span> 
                <!-- Modal Content (The Image) -->
                <img class="modal-content-picture" id="img01"> 
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>