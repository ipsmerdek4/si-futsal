
 <div class="card">
    <div class="card-header card-header-icon" data-background-color="purple">
        <i class="material-icons">check_circle</i>
    </div>

    

    <div class="card-content">
        <h4 class="card-title title-transaksi">Transaksi Booking Lapangan</h4>  
        <!--  -->
        <div class="col-md-12 alert-pass ">
        <?php if (!empty(session()->getFlashdata('error'))) : ?> 
            <div class="alert alert-warning">
                <button type="button" aria-hidden="true" class="close">
                    <i class="material-icons">close</i>
                </button>
                <span>
                    <?php echo session()->getFlashdata('error'); ?>
                </span> 
            </div>
        <?php endif; ?>    
        </div>
        
        <?php 
        if (isset($tgl_book)) {
            $tgl_book = $tgl_book; 
                $pecah_tgl_book = explode('/', $tgl_book);
                $tahunedit      = explode(' ', $pecah_tgl_book[2]);
                $tgl_book_new   = $tahunedit[0].'-'.$pecah_tgl_book[1].'-'.$pecah_tgl_book[0]; 
            /*  */
            $dis1 = 'disabled ';
            $cursor = 'style="cursor: no-drop !important;"';
        }else{
            $tgl_book = date('d/m/Y'); 
            $dis1 = "";
            $cursor = '';
        } 
        /* tanggal Booking */
        if (isset($lpng_book)) {
            $lpng_book = $lpng_book;
            $dis1 = 'disabled'; 
        }else{
            $lpng_book = ""; 
            $dis1 = "";
        } 
        /* Booking Lapangan  */
        if (isset($wm_book)) {
            $wm_book = $wm_book;
             
                /*  */
            $dis1 = 'disabled';
        }else{
            $wm_book = ""; 
            $dis1 = "";
        } 
        /* waktu Boking */
        if (isset($wb_book)) { 
            /*  */
            $dis1 = 'disabled';
        }else{
            $wb_book = ""; 
            $dis1 = "";
        /* Waktu Lama bermain */
        }     
        ?>
        <form id="form-transaksi" class="form-horizontal" enctype="multipart/form-data">
            <div class="row"  >
                <div class="col-md-6" >
                    
                        <div class="row">
                            <label class="col-md-3 col-xs-12 label-on-left text-warna">Nama</label>
                            <div class="col-md-7">
                                <div class="form-group label-floating is-empty"> 
                                    <input type="text" class="form-control-tks-disable" readonly value="<?=$dataidentitas->firstname?>">
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <label class="col-md-3 col-xs-12 label-on-left text-warna">Nama Tim</label>
                            <div class="col-md-7">
                                <div class="form-group label-floating is-empty"> 
                                    <input type="text" class="form-control-tks-disable" readonly value="<?=$dataidentitas->tim?>">
                                </div>
                            </div>
                        </div> 
                        <div class="row">  
                            <label class="col-md-3 col-xs-12 label-on-left text-warna text-warna-spc"  >Tanggal<br>Booking</label>
                            <div class="col-md-7">
                                <div class="form-group label-floating is-empty label-floating-select">   
                                    <input type="text" id="tgl_book"  class="form-control-tks datepicker" value="<?=$tgl_book?>" <?=$dis1?> <?=$cursor?>  > 
                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <label class="col-md-3 col-xs-12 label-on-left text-warna text-warna-spc"  >Booking<br>Lapangan</label>
                            <div class="col-md-7" >
                                <div class="form-group label-floating is-empty label-floating-select"  >  
                                      <select class="select-drop-input " id="lpng_book" name="lpng_book" style="width:100%" <?=$dis1?>  > 
                                            <option value="0" readonly selected  >Pilih Lapangan</option>
                                         <?php
                                            for ($iiii=1; $iiii < 3 ; $iiii++) {    
                                        ?>  
                                            <option value="<?=$iiii?>" <?php echo ($iiii == $lpng_book) ? "selected" : ""?>  >Lapangan <?=$iiii ?></option> 
                                        <?php
                                            }
                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <label class="col-md-3 col-xs-12 label-on-left text-warna text-warna-spc"  >Booking<br>Waktu Mulai</label>
                            <div class="col-md-7">
                                <div class="form-group label-floating is-empty label-floating-select">  
                                      <select class="select-drop-input " id="wm_book" style="width:100%" <?=$dis1?> > 
                                            <option value="0" readonly selected>Pilih Waktu</option>
                                         <?php
                                            for ($i=0; $i < 16 ; $i++) {  
                                                    $nilai = 8 + $i;  
                                            if ($nilai == 8 || $nilai == 9 ) {
                                                $nilai = '0'.$nilai.':00';  
                                            }else{
                                                $nilai = $nilai.':00';
                                            }

                                            if ($nilai <= '18:00') {
                                                $nilai2 = $nilai.'-1';
                                                $nilai = $nilai.' ~ [ Siang ]';
                                            }else{
                                                $nilai2 =$nilai.'-2';
                                                $nilai = $nilai.' ~ [ Malam ]';
                                            }
                                        ?>  
                                            <option value="<?=$nilai2?>" <?php echo ($nilai2 == $wm_book) ? "selected" : ""?> ><?=$nilai ?></option> 
                                        <?php
                                            }
                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="row">  
                            <label class="col-md-3 col-xs-12 label-on-left text-warna text-warna-spc"  >Booking<br>Waktu Bermain</label>
                            <div class="col-md-7">
                                 <div class="form-group label-floating is-empty label-floating-select">  
                                      <select class="select-drop-input " id="wb_book" style="width:100%" <?=$dis1?> > 
                                        <option value="0" readonly selected>Pilih Waktu</option> 
                                        <?php 
                                            for ($iii=1; $iii < 16 ; $iii++) { 
                                        ?>
                                        <option value=<?=$iii?>  <?php echo ($iii == $wb_book) ? "selected" : ""?> ><?=$iii?> Jam</option> 
                                        <?php
                                            }
                                        ?> 
                                    </select>

                                </div>
                            </div>
                        </div> 
                        <?php 
                            if (!isset($disbtm)) { 
                        ?> 
                        <hr class="hr-color">
                        <div class="row"> 
                            <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2">
                                <div class="form-group form-button label-on-left button-trk-spc">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        &nbsp; Check  
                                    </button>
                                </div>
                            </div>
                        </div>  
                        <?php    
                            }else{
                        ?>
                        <hr class="hr-color">
                        <div class="row"> 
                            <div class="col-md-8 col-md-offset-2 col-xs-8 col-xs-offset-2">
                                <div class="form-group form-button label-on-left button-trk-spc">
                                    <a href="<?=base_url()?>/transaksi" class="btn btn-block btn-danger">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    &nbsp; Kembali
                                    </a>
                                </div>
                            </div>
                        </div>  
                        <?php
                            }
                        ?>
                </div> 
            
        </form>
                <div class="col-md-6" style="border-left: 1px solid red;" >
                    
                        <div class="row"> 
                            <div class="col-md-12">
                                <div class="form-group label-floating is-empty">
                                
                                        <div id="response" class="">
                                            Silahkan lengkapi Pilihan Transaksi Terlebih Dahulu.
                                        </div>
                              
                                         
                                    </div>
                            </div>
                        </div>

                </div>
            </div>
        <!--  --> 
    </div> 
</div>
 