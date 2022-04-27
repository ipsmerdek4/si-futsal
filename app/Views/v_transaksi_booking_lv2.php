
                <div class="container-fluid">  
                    <br> 
                    <div class="row">
                        <div class="col-lg-12  ">
                             <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment_turned_in</i>
                                </div>
                                <div class="card-content card-title-spc">
                                    <h4 class="card-title title-spc">Transaksi Booking</h4>
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
                                                    <input type="text" id="tgl-transaksi-booking" class="form-control datetimepicker" value="<?=$tglnew?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-2 date-button-jadwal"  >  
                                                    <button id="btn-transaksi-booking" class="btn btn-success">
                                                    <i class="material-icons">view_day</i> 
                                                        Tampilkan
                                                    </button> 
                                            </div>
                                        </div>  


                                    <table id="transaksi_booking" class="table table-striped table-no-bordered table-hover table-spc" cellspacing="0" width="100%" style="width:100%;color:#9c27b0;border-color:#9c27b0 !important;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Transaksi</th>
                                                <th>Lapangan</th>
                                                <th>Waktu<br>Mulai</th>
                                                <th>Lama<br>Bermain</th>
                                                <th>Total<br>Pembayaran</th>
                                                <th>Pembayaran<br>Awal</th>
                                                <th>Status</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  foreach ($dataHistori as $v_dataHistori): ?> 
                                            <tr>
                                                <td></td>
                                                <td><b><?=$v_dataHistori->kode_transaksi?></b></td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" >
                                                        <i class="material-icons">assignment</i> <b> Lapangan <?=$v_dataHistori->booking_lapangan?> </b>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </td>
                                                <td> 
                                                    <button class="btn btn-primary btn-xs" >
                                                        <i class="material-icons">access_alarm</i> 
                                                        <?=$v_dataHistori->booking_start?>
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </td>
                                                <td> 
                                                    <button class="btn btn-primary btn-xs" >
                                                        <i class="material-icons">access_alarm</i> 
                                                        <?=$v_dataHistori->booking_play?> Jam
                                                        <div class="ripple-container"></div>
                                                    </button>
                                                </td>
                                                <td> 
                                                    <button class="btn btn-primary btn-xs" >
                                                        <?="Rp " . number_format($v_dataHistori->total_harga,2,',','.')?>
                                                        <div class="ripple-container"></div>
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
                                                        <div class="ripple-container"></div>
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
                                            </tr> 
                                             <?php endforeach; ?> 
                                        </tbody> 
                                    </table>




 
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>