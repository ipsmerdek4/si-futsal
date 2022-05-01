
                <div class="container-fluid">  
                    <br> 
                    <div class="row">
                        <div class="col-lg-12  ">
                             <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment_turned_in</i>
                                </div>
                                <div class="card-content card-title-spc">
                                    <h4 class="card-title title-spc">Laporan Transaksi</h4>
                                    <hr> 
                                       
                                        <br><br>
                                        <form action="<?=base_url()?>/laporan/cetak" method="post" target="_blank">
                                            <div class="row"  >
                                                <div class="col-md-1" style="width:90px;">
                                                    <b style="" >Tanggal :</b>
                                                </div>
                                                <div class="col-md-2 date-input-jadwal"  > 
                                                    <div class="form-group"> 
                                                    
                                                        <input type="text" name="tgl_transaksi" class="form-control datetimepicker" value="<?=date("d-m-Y")?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-2 date-button-jadwal"  >  
                                                        <button id="btn-transaksi-booking" class="btn btn-success">
                                                        <i class="material-icons">view_day</i> 
                                                            Tampilkan
                                                        </button> 
                                                </div>
                                            </div>  
                                        </form>


 
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>