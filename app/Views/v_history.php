

<div class="card">
    <div class="card-header card-header-icon" data-background-color="purple">
        <i class="material-icons">history</i>
    </div>

    

    <div class="card-content">
        <h4 class="card-title title-histori">History Booking Lapangan</h4>  
        <div class="material-datatables">
        <!--  -->
        

        <?php
            if (isset($lockviewall)) {

        ?>
    
            <form action="<?=base_url()?>/history/viewall" method="post">
            <div class="row"  >
                <div class="col-md-1" style="width:90px;">
                    <b style="" >Tanggal :</b>
                </div>
                <div class="col-md-2 date-input-jadwal"  > 
                    <div class="form-group"> 
                        <input type="text" name="tglallv" class="form-control datetimepicker" value="<?=$tgl2?>" />
                    </div>
                </div>
                <div class="col-md-2 date-button-jadwal"  >  
                        <button class="btn btn-success">
                        <i class="material-icons">view_day</i> 
                            Tampilkan
                        </button> 
                </div>
            </div> 
            </form>
            <hr> 

            <table id="all_history" class="table table-striped table-no-bordered table-hover table-histori" cellspacing="0" width="100%" style="width:100%;color:#9c27b0;border-color:#9c27b0 !important;">
                 <thead>
                    <tr>
                        <th>No</th>
                        <th>Bukti</th> 
                        <th>Kode Transaksi</th>
                        <th>Lapangan</th>
                        <th>Time</th>
                        <th>Harga</th>
                        <th>TOKEN</th>
                        <th>Status</th> 
                        <th>Opsi</th> 
                    </tr>
                </thead>
                <tbody>                
                <?php  foreach ($dataHistori as $val_dataHistori): ?>   
                    <tr>
                        <td></td>
                        <td> 
                            <?php
                                if ($val_dataHistori->booking_bukti == 0) {
                                    # code...
                                }else{
                                    echo '<img id="myImg" src="'.base_url().'/uploads/bukti/'.$val_dataHistori->booking_bukti.'" alt="'.$val_dataHistori->booking_bukti.'" style="width:100%;max-width:50px">';
                                }
                            ?>
                            
                        </td>
                        <td>
                            <button class="btn btn-primary btn-xs" > 
                                <b><?=$val_dataHistori->kode_transaksi?></b>
                                <div class="ripple-container"></div>
                            </button>  
                        </td>
                        <td>
                            <button class="btn btn-primary btn-xs" >
                                <i class="material-icons">assignment</i> <b> Lapangan <?=$val_dataHistori->booking_lapangan?> </b>
                                <div class="ripple-container"></div>
                            </button> 
                        </td>
                        <td>
                            <button class="btn btn-primary btn-xs" >
                                <i class="material-icons">access_alarm</i> 
                                <?=$val_dataHistori->booking_start?>
                                <div class="ripple-container"></div>
                            </button> 
                        </td>
                        <td>
                            <button class="btn btn-primary btn-xs" > 
                                <b><?="Rp " . number_format($val_dataHistori->total_harga,2,',','.');?></b>
                                <div class="ripple-container"></div>
                            </button>  
                        </td>
                        <td> 
                            <button class="btn btn-primary btn-xs" > 
                                <b><?=$val_dataHistori->booking_TOKEN?></b>
                                <div class="ripple-container"></div>
                            </button> 
                            
                        </td>
                        <td>
                            <?php 
                            if ($val_dataHistori->booking_status == 1) {
                            ?>
                            <button class="btn btn-warning btn-xs" >
                                <i class="material-icons">access_time</i> <b>Waiting ... </b>
                                <div class="ripple-container"></div>
                            </button>
                            <?php
                            }elseif ($val_dataHistori->booking_status == 2) {
                            ?>  
                            <button class="btn btn-success btn-xs" >
                                <i class="material-icons">access_time</i> <b>Waiting ... </b>
                                <div class="ripple-container"></div>
                            </button> 
                            <?php
                            }elseif ($val_dataHistori->booking_status == 3) {
                            ?>  
                            <button class="btn btn-primary btn-xs" >
                                <i class="material-icons">check</i> <b>Approve</b>
                                <div class="ripple-container"></div>
                            </button> 
                            <?php
                            }elseif ($val_dataHistori->booking_status == 9) {
                            ?> 
                            <button class="btn btn-danger btn-xs" >
                                <i class="material-icons">clear</i> <b>Cancel</b>
                                <div class="ripple-container"></div>
                            </button>
                            <?php 
                            } 
                            ?> 
                        </td>
                        <td>
                            <?php
                            if (($val_dataHistori->booking_status == 9)||($val_dataHistori->booking_status == 2)||($val_dataHistori->booking_status == 3)) {
                            ?>
                            <button class="btn btn-default btn-xs " >
                                <i class="material-icons">clear</i> 
                                <div class="ripple-container"></div>
                            </button>
                            <?php
                            }else{
                            ?>
                            <button class="btn btn-danger btn-xs open-historicancel" data-id="<?=$val_dataHistori->id_histori?>"  data-toggle="modal" data-target="#cancel_btn"  >
                                <i class="material-icons">clear</i> 
                                <div class="ripple-container"></div>
                            </button> 
                            <?php
                            }
                            ?>
                        </td>
                     </tr>
                <?php endforeach; ?>  
                </tbody>

            </table>
          
            <!-- modal -->
            <div class="modal fade" id="cancel_btn" 
                tabindex="-1" 
                aria-labelledby="exampleModalLabel" 
                aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" 
                                id="exampleModalLabel">
                                <b>Cancel Booking Lapangan</b>
                            </h5> 
                            <hr style="margin:10px 0 0 0; border-top:1px solid red">
                        </div> 
                        <form action="<?=base_url()?>/history/viewall/cancel" method="post">
                        <div class="modal-body">
                            <div class="text-center">
                                <p>Apakah Anda Yakin ? <br>Prosess ini akan Membatalkan Prosess Booking Anda.</p>
                            </div>
                            <input type="hidden" name="history_one" id="myhistoricancel" readonly/>
                        </div>
                        <div class="modal-footer text-center">  
                            <button type="button" class="btn btn-danger" data-dismiss="modal">&nbsp; &nbsp; &nbsp; &nbsp;Tidak &nbsp;&nbsp;&nbsp; &nbsp;   </button>
                            <button type="submit" class="btn btn-success">Lanjutkan  </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
 
            <div>
                <b>Keterangan :</b>
                <ul>
                    <li>
                            <button class="btn btn-warning btn-xs" >
                                <i class="material-icons">access_time</i> <b>Waiting ... </b>
                                <div class="ripple-container"></div>
                            </button>

                            <b>Status ini adalah Status menunggu Konfirmasi dari anda, jika belum mengupload Bukti Transfer.</b>
                    </li>
                    <li>
                            <button class="btn btn-success btn-xs" >
                                <i class="material-icons">access_time</i> <b>Waiting ... </b>
                                <div class="ripple-container"></div>
                            </button> 

                            <b>Status ini adalah Status menunggu Verifikasi dari Admin, Bahwa Anda sudah Konfirmasi Booking Lapangan.</b>
                    </li>
                    <li>
                            <button class="btn btn-danger btn-xs" >
                                <i class="material-icons">clear</i> <b>Cancel</b>
                                <div class="ripple-container"></div>
                            </button>

                            <b>Status ini adalah Status Pembatalan Booking Lapangan.</b>
                    </li>
                    <li>
                            <button class="btn btn-primary btn-xs" >
                                <i class="material-icons">check</i> <b>Approve</b>
                                <div class="ripple-container"></div>
                            </button> 

                            <b>Status ini adalah Status Booking Lapangan dan Silahkan Tunjukan TOKEN ke Petugas di Lapangan.</b>
                    </li>
                </ul>
            </div>
 

            <!-- The Modal -->
            <div id="myModal" class="modal modal-picture">

                <!-- The Close Button -->
                <span class="closeX">&times;</span>

                <!-- Modal Content (The Image) -->
                <img class="modal-content-picture" id="img01">

                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
            </div>
 

        <?php
            }else{
        ?>

        

            <div class="row"  >
                <div class="col-md-1" style="width:90px;">
                    <b style="" >Tanggal :</b>
                </div>
                <div class="col-md-2 date-input-jadwal"  > 
                    <div class="form-group"> 
                        <input type="text" class="form-control" value="<?=date('d-m-Y')?>" disabled />
                    </div>
                </div> 
            </div> 
            <hr> 
            <table id="daftar_history" class="table table-striped table-no-bordered table-hover table-histori" cellspacing="0" width="100%" style="width:100%;color:#9c27b0;border-color:#9c27b0 !important;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Lapangan</th>
                        <th>Time</th>
                        <th>Harga</th>
                        <th>Status</th> 
                    </tr>
                </thead>
                <tbody>
                <?php  foreach ($dataTransaksi as $val): ?>   
                    <tr>
                        <td></td>
                        <td>#<?=$val->kode_transaksi?></td>
                        <td> 
                            <button class="btn btn-primary btn-xs" >
                                <i class="material-icons">assignment</i> <b> Lapangan <?=$val->booking_lapangan?> </b>
                                <div class="ripple-container"></div>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-xs" >
                                <i class="material-icons">access_alarm</i> 
                                <?=$val->booking_start?>
                                <div class="ripple-container"></div>
                            </button>
                        </td>
                        <td><?=$val->total_harga?></td>
                        <td>
                            <?php 
                            if ($val->booking_status == 1) {
                            ?>
                            <button class="btn btn-warning btn-xs" >
                                <i class="material-icons">access_time</i> <b>Waiting ... </b>
                                <div class="ripple-container"></div>
                            </button>
                            <?php
                            }elseif ($val->booking_status == 2) {
                            ?>  
                            <button class="btn btn-success btn-xs" >
                                <i class="material-icons">access_time</i> <b>Waiting ... </b>
                                <div class="ripple-container"></div>
                            </button> 
                            <?php
                            }elseif ($val->booking_status == 9) {
                            ?> 
                            <button class="btn btn-danger btn-xs" >
                                <i class="material-icons">clear</i> <b>Cancel</b>
                                <div class="ripple-container"></div>
                            </button>
                            <?php 
                            } 
                            ?>
                       
                        
                        
                        </td>
                    </tr>
                <?php endforeach; ?>      
                </tbody>
                 <tfoot>
                    <tr>
                        <th></th> 
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>  
                        <th></th> 
                    </tr>
                </tfoot>
            </table>


            <style>
              
                
            </style>


 
            <div class="modal fade" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content modal-alert-spc">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Peringatan!</h4>
                            <hr>
                        </div>
                        <div class="modal-body">    
                                <?php echo session()->getFlashdata('alert'); ?> 
                        </div>  
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div> 
                    </div>
                </div>
            </div>
 
            <!-- Modal -->
            <div class="modal fade" id="his_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Konfirmasi Pembayaran Booking Lapangan Futsal</h4>
                    <hr>
                </div>
                 <ul> 
                        <form action="<?=base_url()?>/history/s" method="post" enctype="multipart/form-data"> 
                    <?php
                            foreach ($dataHistori as $vdataHistori) { 
                                echo '
                                    <div class="modal-body"> 
                                    ';
                        
                                echo '<li>Kode Transaksi : '.$vdataHistori->kode_transaksi.' </li>';
                                echo '<li>Tanggal : '.$vdataHistori->tgl_booking_lapangan.' </li>';
                                echo '<li>Mulai Bermain : '.$vdataHistori->booking_start.' Wita </li>';
                                echo '<li>Lama Bermain : '.$vdataHistori->booking_play	.' Jam </li>';
                                echo '<hr>';
                                echo '<li> <b>TOTAL : Rp '.  number_format($vdataHistori->total_harga,2,',','.').' + Kode unix </b> </li>';
                                echo '<li> <b>Kode unix Anda adalah : '.$vdataHistori->kode_unix.'</b> </li>';
                                echo '<li> <b>Total Pembayaran Anda adalah : Rp '.number_format(($vdataHistori->total_harga + $vdataHistori->kode_unix),2,',','.').'</b> </li>';
                                echo ' <br>
                                    <b>Silahkan Lakukan Pembayaran dengan Transfer ke Rekening Berikut : </b> 
                                    <br><br>        
                                    <li>BANK BCA</li>
                                    <li>Nama : PT Si-Futsal Indonesia</li>
                                    <li>Code Bank : 014</li>
                                    <li>No. Rekening : 1234-12-1234</li>
                                    <li>KCP Denpasar</li>
                                    <br>       ';
                                echo '<small class="text-danger">*</small> Jika Sudah melakukan transfer silahkan upload bukti dengan cara screenshoot bukti transfer dan upload file ke bagan dibawah ini.';
                                echo '<input class="" type="hidden" name="bukti" value="'.$vdataHistori->id_histori.'-'.$vdataHistori->kode_transaksi.'-'.$vdataHistori->id_identitas.'" readonly>';   
                                echo '<input class="" type="file" name="gbrbukti">';   

                                echo '   
                                    </div>
                                    <div class="modal-footer">  
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                            ';
                            }
                    ?>
                        </form> 

                </ul> 

                </div>
            </div>
            </div>


        <?php
            }
        ?>


        </div>
    </div>
</div>