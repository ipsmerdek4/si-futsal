
                <div class="container-fluid">  
                    <br> 
                    <div class="row">
                        <div class="col-lg-12  ">
                             <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content card-title-spc">
                                    <h4 class="card-title title-spc">Penjadwalan</h4>
                                    <hr> 
                                        <?php
                                            $lpngslt1 = '';
                                            $lpngslt2 = ''; 
                                            if (isset($lapangan)) {
                                                $lapangan = $lapangan;
                                            }else{
                                                $lapangan = "1 (Satu)";  
                                            }
                                            if ($lapangan == 1) {
                                                $lapangan = "1 (Satu)";
                                                $lpngslt1 = "selected";
                                            }elseif($lapangan == 2){
                                                $lapangan = "2 (Dua)";  
                                                $lpngslt2 = "selected"; 
                                            } 

                                            if (isset($tgl)) {
                                                $vtgl = $tgl;
                                            }else{
                                                $vtgl = date('d-m-Y'); 
                                            }
                                        ?>





                                    <br><br>
                                    <div class="row"  >
                                        <div class="col-md-1" style="width:90px;">
                                            <b style="" >Tanggal :</b>
                                        </div>
                                        <div class="col-md-2 date-input-jadwal"  > 
                                            <div class="form-group"> 
                                                <input type="text" id="jadwaltaglval" name="tgl" class="form-control datetimepicker" value="<?=$vtgl?>" />
                                            </div>
                                        </div>
                                        <div class="col-md-2  date-input-jadwal"  > 
                                            <div class="form-group"> 
                                                <select class="select-drop-input " id="lapnganval" style="width:100%"   >  
                                                        <option value="1" <?=$lpngslt1?>>Lapangan 1</option> 
                                                        <option value="2" <?=$lpngslt2?>>Lapangan 2</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2 date-button-jadwal"  >  
                                                <button type="button" id="jadwaltagl" class="btn btn-success">
                                                    Tampilkan
                                                </button> 
                                        </div>
                                    </div>


                                    <table id="jadwal_lv2" class="table table-striped table-no-bordered table-hover table-spc" cellspacing="0" width="100%" style="width:100%;color:#9c27b0;border-color:#9c27b0 !important;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jam</th>
                                                <th>Nama Tim/Perwakilan</th>
                                                <th>Lapangan</th>
                                                <th>Status</th>  
                                                <th>Opsi</th>  
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            <?php
                                                for ($i=0; $i < 16 ; $i++) {   
                                                    $nilai = 8 + $i; 
                                                    if ($nilai < 10) {
                                                        $nilai = "0".$nilai;
                                                    }
                                                    $nilai = $nilai .':00:00';
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" >
                                                        <i class="material-icons">access_alarm</i> 
                                                        <?=$nilai?> 
                                                    </button>
                                                </td>
                                                <td>
                                                    <?php
                                                    $nilaitrans = 0;
                                                    $nilaitotal = 0;
                                                    foreach ($dataTransaksi as $v_dataTransaksi) { 
                                                        $nilaitrans ++;
                                                        if ($v_dataTransaksi->booking_start == $nilai) {
                                                            if ($v_dataTransaksi->booking_status != 9) {
                                                            
                                                                $nilaitotal += $nilaitrans;
                                                                echo '<b>'.$v_dataTransaksi->tim.'/'.$v_dataTransaksi->firstname.'</b>';
                                                            } 
                                                        } 
                                                    }  
            
                                                    if ($nilaitotal == 0) {
                                                        echo "-";
                                                    }
 
                                                    ?> 
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-xs" >
                                                        <i class="material-icons">assignment</i> <?=$lapangan?>
                                                        <div class="ripple-container"></div>
                                                    </button> 
                                                </td>
                                                <td>
                                                    <?php
                                                    $nilaitrans = 0;
                                                    $nilaitotal = 0;
                                                    foreach ($dataTransaksi as $v_dataTransaksi) { 
                                                        $nilaitrans ++;
                                                        if ($v_dataTransaksi->booking_start == $nilai) {
                                                            if ($v_dataTransaksi->booking_status != 9) { 
                                                                $nilaitotal += $nilaitrans;
                                                                if ($v_dataTransaksi->booking_status == 1) {
                                                                    echo '
                                                                    <button class="btn btn-warning btn-xs" >
                                                                        <i class="material-icons">access_time</i> <b>Waiting ... </b> 
                                                                    </button>'; 
                                                                }elseif ($v_dataTransaksi->booking_status == 2) {
                                                                    echo '  
                                                                    <button class="btn btn-success btn-xs" >
                                                                        <i class="material-icons">access_time</i> <b>Waiting ... </b> 
                                                                    </button> ';
                                                                }elseif ($v_dataTransaksi->booking_status == 3) {
                                                                    echo ' 
                                                                    <button class="btn btn-primary btn-xs" >
                                                                        <i class="material-icons">check</i> <b>Approve </b> 
                                                                    </button> '; 
                                                                }elseif ($v_dataTransaksi->booking_status == 4) {
                                                                    echo ' 
                                                                        <button class="btn btn-primary btn-xs" >
                                                                            <i class="material-icons">check</i> 
                                                                            <b>Lunas</b> 
                                                                        </button> ';
                                                                }elseif ($v_dataTransaksi->booking_status == 5) {
                                                                    echo ' 
                                                                        <button class="btn btn-primary btn-xs" >
                                                                            <i class="material-icons">check</i> 
                                                                            <b>Lunas</b> 
                                                                        </button> '; 
                                                                }elseif ($v_dataTransaksi->booking_status == 9) {
                                                                    echo '
                                                                    <button class="btn btn-danger btn-xs" >
                                                                        <i class="material-icons">clear</i> <b>Cancel</b> 
                                                                    </button>';
                                                                }    
                                                            } 
                                                        } 
                                                    }  
            
                                                    if ($nilaitotal == 0) {
                                                        echo "-";
                                                    } 
                                                    ?> 
                                                </td> 
                                                <td>
                                                    <?php
                                                    $nilaitrans = 0;
                                                    $nilaitotal = 0;
                                                    foreach ($dataTransaksi as $v_dataTransaksi) { 
                                                        $nilaitrans ++;
                                                        if ($v_dataTransaksi->booking_start == $nilai) {
                                                            if ($v_dataTransaksi->booking_status != 9) {   
                                                                if ($v_dataTransaksi->tgl_booking_lapangan < date("Y-m-d")) {
                                                                    //kosongkan
                                                                }else{
                                                                    if ($v_dataTransaksi->booking_status == 1) {
                                                                        echo ' 
                                                                            <button class="btn btn-danger btn-xs btn-konfirmasi" data-id="'.$v_dataTransaksi->id_transaksi.'*1"  data-toggle="modal" data-target="#_access_open"  >
                                                                                <i class="material-icons">clear</i> <b>Cancel</b> 
                                                                            </button> 
                                                                        ';
                                                                        $nilaitotal += $nilaitrans; 
                                                                    }else{  
                                                                        if ($v_dataTransaksi->booking_status != 5) {                                                                             
                                                                            echo ' 
                                                                            <button class="btn btn-success btn-xs btn-konfirmasi" data-id="'.$v_dataTransaksi->id_transaksi.'*2"  data-toggle="modal" data-target="#_access_open"  >
                                                                                <i class="material-icons">create</i> <b>edit</b> 
                                                                            </button> 
                                                                            '; 
                                                                        }
                                                                    } 
                                                                }  
                                                                
                                                            } 
                                                        } 
                                                    }  
            
                                                    if ($nilaitotal == 0) {
                                                        echo "-";
                                                    }
 
                                                    ?> 

                                                </td>
                                            </tr>

                                            <?php
                                                }
                                            ?>
                                           
                                        </tbody> 
                                    </table>




 
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>




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
                                <?php  echo session()->getFlashdata('pesanbookinglv2'); ?> 
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
                <div class="modal-dialog  ">
                    <div class="modal-content ajx_pembayaran response">
                         <?php  echo session()->getFlashdata('respon_bedaharga_lv2'); ?> 
                    </div>
                </div>
            </div>
