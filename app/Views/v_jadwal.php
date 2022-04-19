

    
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">assignment</i>
            </div>

            <div class="card-content">
                <h4 class="card-title title-jadwal">Daftar Jadwal Booking Lapangan</h4> 
                <div class="material-datatables">
                     

                    
                        <div class="row"  >
                            <div class="col-md-1" style="width:90px;">
                                <b style="" >Tanggal :</b>
                            </div>
                            <div class="col-md-2 date-input-jadwal"  > 
                                <div class="form-group"> 
                                    <input type="text" class="form-control datetimepicker" value="<?=date('d-m-Y')?>" />
                                </div>
                            </div>
                            <div class="col-md-2 date-button-jadwal"  >  
                                    <button class="btn btn-success">
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
                                for ($i=0; $i < 13 ; $i++) {  
                            ?>
                            <tr>
                                <td><?=$i+1?></td>
                                <td><button class="btn btn-primary btn-xs" >
                                        <i class="material-icons">access_alarm</i> 
                                        <?php 
                                            $nilai = 8 + $i; 
                                            echo $nilai .':00';
                                        ?>
                                        <div class="ripple-container"></div>
                                    </button></td></td>
                                <td>EdinburghEdinburgh Edinburgh</td>
                                <td>
                                    <button class="btn btn-primary btn-xs" >
                                        <i class="material-icons">assignment</i> 1 (Satu)
                                        <div class="ripple-container"></div>
                                    </button></td>
                                <td>
                                    <button class="btn btn-success btn-xs" >
                                        <i class="material-icons">check</i> Approve
                                        <div class="ripple-container"></div>
                                    </button>
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
    