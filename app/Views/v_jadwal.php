

    
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>

            <div class="card-content">
                <h4 class="card-title title-jadwal">Daftar Jadwal Booking Lapangan</h4> 
                <div class="material-datatables">
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
                        <hr>
                        <table id="daftar_jdwl" class="table table-striped table-no-bordered table-hover table-jadwl" cellspacing="0" width="100%" style="width:100%;color:#9c27b0;border-color:#9c27b0 !important;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jam</th>
                                <th>Nama Tim/Perwakilan</th>
                                <th>Lapangan</th>
                                <th>Status</th> 
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
                                echo "<tr>";
                                echo "<td>".($i+1)."</td>"; 
                                echo '<td>';
                                $nilaitrans = 0;
                                $nilaitotal = 0;
                                foreach ($dataTransaksi as $v_dataTransaksi) { 
                                    $nilaitrans ++;
                                    if ($v_dataTransaksi->booking_start == $nilai) {
                                        if ($v_dataTransaksi->booking_status != 9) {
                                        
                                            $nilaitotal += $nilaitrans;
                                            echo ' 
                                                    <button class="btn btn-danger btn-xs" >
                                                        <i class="material-icons">access_alarm</i> 
                                                        '.$nilai.' 
                                                    </button> 
                                            ';
                                        } 
                                    } 
                                }  

                                if ($nilaitotal == 0) {
                                        echo ' 
                                            <button class="btn btn-primary btn-xs" >
                                                <i class="material-icons">access_alarm</i> 
                                                '.$nilai.' 
                                            </button> 
                                    ';
                                } 
                                echo '</td>'; 
                                echo '<td>'; 
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
                                         //print_r($kirimnilai);
                                echo "</td>"; 
                                echo '<td>
                                        <button class="btn btn-primary btn-xs" >
                                            <i class="material-icons">assignment</i> '.$lapangan.'
                                            <div class="ripple-container"></div>
                                        </button>
                                    </td>';
                                echo '<td>'; 
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
                                         //print_r($kirimnilai);
                                echo "</td>";
 
                                echo "</tr>";


                                    
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>

        
    