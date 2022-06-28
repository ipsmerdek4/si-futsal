
                <div class="container-fluid">  
                    <br> 
                    <div class="row">
                        <div class="col-lg-12  ">
                             <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="card-content card-title-spc">
                                    <h4 class="card-title title-spc">Pelanggan</h4>
                                    <hr> 
                                        
                                    <table id="pelanggan" class="table table-striped table-no-bordered table-hover table-spc" cellspacing="0" width="100%" style="width:100%;color:#9c27b0;border-color:#9c27b0 !important;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Picture</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Nama TIM</th>
                                                <th>HP</th>
                                                <th>Email</th>
                                                <th>Alamat</th> 
                                                <th>Opsi</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  foreach ($dataIdentitas as $v_dataIdentitas): ?>  
                                            <tr>
                                                <td> </td>
                                                <td>
                                                     <img class="myImg" src="<?=base_url()?>/uploads/<?=$v_dataIdentitas->gambar?>" alt="<?=$v_dataIdentitas->gambar?>" style="width:100%;max-width:50px"> 
    

                                                </td>
                                                <td><?=$v_dataIdentitas->firstname?></td>
                                                <td><?=$v_dataIdentitas->lastname?></td>
                                                <td><?=$v_dataIdentitas->tim?></td>
                                                <td><?='+62'.$v_dataIdentitas->hp?></td>
                                                <td><?=$v_dataIdentitas->email?></td>
                                                <td><?=$v_dataIdentitas->alamat.', '.$v_dataIdentitas->provinsi_name.', '.$v_dataIdentitas->kabupaten_name.', '.$v_dataIdentitas->kecamatan_name.', '.$v_dataIdentitas->desa_name?></td>
                                                <td>
                                                        <button class="btn btn-success btn-xs btn--pelanggan" data-id="<?=$v_dataIdentitas->id_identitas?>"  data-toggle="modal" data-target="#add_pelanggan"  >
                                                             &nbsp;<i class="material-icons">check</i> 
                                                            <b> Edit </b> &nbsp; &nbsp;&nbsp;
                                                        </button>
                                                        <button class="btn btn-danger btn-xs btn-get-pelanggan" data-id="<?=$v_dataIdentitas->id_identitas?>"  data-toggle="modal" data-target="#_modal_pelanggan"  >
                                                            <i class="material-icons">clear</i> 
                                                            <b>Hapus</b> 
                                                        </button>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?> 

                                        </tbody> 
                                    </table>

                                    <!-- The Modal view picture -->
                                    <div id="myModal" class="modal modal-picture">  
                                        <!-- The Close Button -->
                                        <span class="closeX">&times;</span> 
                                        <!-- Modal Content (The Image) -->
                                        <img class="modal-content-picture" id="img01"> 
                                        <!-- Modal Caption (Image Text) -->
                                        <div id="caption"></div>
                                    </div>


                                     <!-- modal -->
                                    <div class="modal fade" id="add_pelanggan" 
                                        tabindex="-1" 
                                        aria-labelledby="exampleModalLabel" 
                                        aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <div class="modal-content ajx_pembayaran">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center title-add-pelanggan" >
                                                            Tambah Pelanggan
                                                        </h5> 
                                                        <hr style="margin:10px 0 0 0; border-top:1px solid ">
                                                    </div> 
                                                    


                                                    <form id="_actpelanggan" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body"> 
                                                            <div class="row"  >
                                                                <div class="col-md-6" style=" ">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">beenhere</i>
                                                                        </span>
                                                                        <div class="form-group label-spcs">
                                                                            <label class="control-label">Nama Lengkap
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="firstname" id="firstname" type="text" class="box-p-spc">
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">beenhere</i>
                                                                        </span>
                                                                        <div class="form-group  label-spcs">
                                                                            <label class="control-label">Nama Panggilan
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="lastname" id="lastname" type="text" class="box-p-spc">
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">info</i>
                                                                        </span>
                                                                        <div class="form-group label-spcs">
                                                                            <label class="control-label">Nama TIM
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="tim" id="tim" type="text" class="box-p-spc">
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group spc-hp-edit">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">phone_android</i>
                                                                        </span>
                                                                        <div class="form-group check-hp">
                                                                            <label class="control-label">Nomer HP
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input type="text" name="hp" placeholder="81-234-567-890" id="phone1" class="box-hp-spc" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">email</i>
                                                                        </span>
                                                                        <div class="form-group label-spcs">
                                                                            <label class="control-label">Email
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="email" id="email" type="email" class="box-p-spc">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-6"> 
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">add_location</i>
                                                                        </span>
                                                                        <div class="form-group label-spcs">
                                                                            <label class="control-label">Alamat
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="alamat" id="alamat" type="text" class="box-p-spc">
                                                                        </div>
                                                                    </div>

                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">location_searching</i>
                                                                        </span>
                                                                        <div class="form-group label-spcs">
                                                                            <label class="control-label">Provinsi
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="provinsi" id="provinsi" type="text" class="box-p-spc"> 
                                                                        </div>
                                                                    </div> 
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">location_searching</i>
                                                                        </span>
                                                                        <div class="form-group label-spcs">
                                                                            <label class="control-label">Kabupaten
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="kabupaten" id="kabupaten" type="text" class="box-p-spc">  
                                                                        </div>
                                                                    </div> 
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">location_searching</i>
                                                                        </span>
                                                                        <div class="form-group label-spcs">
                                                                            <label class="control-label">Kecamatan
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="kecamatan" id="kecamatan" type="text" class="box-p-spc">   
                                                                        </div>
                                                                    </div> 
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">location_searching</i>
                                                                        </span>
                                                                        <div class="form-group label-spcs">
                                                                            <label class="control-label">Desa
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="desa" id="desa" type="text" class="box-p-spc">    
                                                                        </div>
                                                                    </div>  

                                                                </div> 
                                                                <div class="col-md-10"  > <br><br></div>
                                                                <div class="col-md-6">   
                                                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput" style="width:100%"> 
                                                                        <label class="control-label" style="text-align:center;width:100%;"> 
                                                                            Picture
                                                                        </label>
                                                                        <div class="fileinput-new thumbnail img-circle">
                                                                            <img id="gambarnya" src="<?=base_url()?>/assets/img/placeholder.jpg" alt="placeholder.jpg">
                                                                        </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                                        <div>
                                                                            <span class="btn btn-round btn-rose btn-file">
                                                                                <span class="fileinput-new">Add Photo</span>
                                                                                <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="gambarnya" />
                                                                            </span>
                                                                            <br />
                                                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="col-md-6">    
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon">
                                                                            <i class="material-icons">person_pin</i>
                                                                        </span>
                                                                        <div class="form-group label-spcs">
                                                                            <label class="control-label">Username
                                                                                <small>(required)</small>
                                                                            </label>
                                                                            <input name="username" id="username" type="text" class="box-p-spc"> 
                                                                        </div>
                                                                    </div> 
                                                                    <div class="password-spc">
                                                                            <!-- kosong -->
                                                                    </div>  
                                                                </div> 
                                                            </div>
                                                            <hr class="hr-modal-spc">
                                                            <div class="modal-footer text-center">  
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">   &nbsp; &nbsp;Batal      &nbsp;  </button>
                                                            `   <button type="submit" class="btn btn-success">Simpan  </button>
                                                            </div>
                                                        </div>
                                                    </form>


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
                                                        <?php  echo session()->getFlashdata('pesan_pelanggan'); ?> 
                                                </div>  
                                                <hr class="hr-alert-modal">
                                                <div class="modal-footer">  
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>





                                     <!-- modal -->
                                    <div class="modal fade" id="_modal_pelanggan" 
                                        tabindex="-1" 
                                        aria-labelledby="exampleModalLabel" 
                                        aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <div class="modal-content response">
 

                                            </div>
                                        </div>
                                    </div>










                                </div>
                            </div>
                        </div> 
                    </div> 
                </div>