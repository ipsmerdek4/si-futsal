

    
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="purple">
                <i class="material-icons">person</i>
            </div>

            <div class="card-content">
                <h4 class="card-title title-spc">Profil</h4> 
                <div class="material-datatables">
                         
                    <div class="row"  >
                        <div class="col-md-3 text-center" >
                             <?php
                                if ($getidentitas[0]->gambar != "") {
                                    echo '<img src="'.base_url().'/uploads/'.$getidentitas[0]->gambar.'" alt="'.$getidentitas[0]->gambar.'" class="img-rounded" style="border:1px solid #8e24aa; padding: 10px;" >';
                                }else{
                                    echo '<img src="'.base_url().'/assets/img/default-avatar.png" alt="default-avatar.png" class="img-rounded" style="border:1px solid #8e24aa; padding: 10px;" >';
                                } 
                            ?>
                        </div>
                        <div class="col-md-9" >
                            <div class="profil-top-spc text-primary ">  
                                <div class="v-profil">
                                    <div class="txt-profil-1">Nama Lengkap </div> 
                                    <div class="txt-profil-2"><?=$getidentitas[0]->firstname?></div> 
                                    <br>
                                </div>
                                <br> 
                                <div class="v-profil">
                                    <div class="txt-profil-1">Nama Panggilan </div> 
                                    <div class="txt-profil-2"><?=$getidentitas[0]->lastname?></div> 
                                    <br>
                                </div>
                                <br> 
                                <div class="v-profil">
                                    <div class="txt-profil-1">Email </div> 
                                    <div class="txt-profil-2" style="text-transform: none !important;"><?=$getidentitas[0]->email?></div> 
                                    <br>
                                </div>
                                <br> 
                                <div class="v-profil">
                                    <div class="txt-profil-1">Nomer Hp/Wa </div> 
                                    <div class="txt-profil-2">+62 <?=$getidentitas[0]->hp?></div> 
                                    <br>
                                </div>
                                <br> 
                                <div class="v-profil">
                                    <div class="txt-profil-1">Nama TIM </div> 
                                    <div class="txt-profil-2"><?=$getidentitas[0]->tim?></div> 
                                    <br>
                                </div>
                                <br> 
                                <div class="v-profil">
                                    <div class="txt-profil-1">Alamat </div> 
                                    <div class="txt-profil-2"><?=$getidentitas[0]->alamat?>, <?=$getidentitas[0]->provinsi_name?>, <?=$getidentitas[0]->kabupaten_name?>, <?=$getidentitas[0]->kecamatan_name?>, <?=$getidentitas[0]->desa_name?></div> 
                                    <br>
                                </div> 
                            </div>
                            <br>
                            <div class="profil-top-spc text-primary">  
                                <div class="v-profil">
                                    <div class="txt-profil-1">Username </div> 
                                    <div class="txt-profil-2"><?=$getidentitas[0]->username_users?></div> 
                                    <br class="end">
                                </div> 
                            </div> 
                            <div class="button-spcs">
                                <button class="btn btn-primary btn-xs btn-profil" data-id="<?=$getidentitas[0]->id_identitas?>"  data-toggle="modal" data-target="#_access_open"  >
                                    <i class="material-icons">person</i> 
                                    ubah
                                </button> 
                            </div>

                        </div>
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
                    <div class="modal-content ">
                        <div class="modal-header">
                            <h5 class="modal-title text-center title-spc-p" >
                                Edit Profil
                            </h5> 
                            <hr class="hr-modal-spc">
                        </div> 

                        
                        <form id="_actprofil" method="post" enctype="multipart/form-data">
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
                                                <input name="lastname" id="lastname" type="text" class="box-p-spc"  ">
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
                                                <input name="tim" id="tim" type="text" class="box-p-spc"  ">
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
                                                <?php
                                                $pecah = explode('-',$getidentitas[0]->hp);
                                                $pecah0 = explode(' ',$pecah[0]); 
                                                ?>
                                                <input type="text" name="hp" placeholder="81-234-567-890" id="phone111" class="box-hp-spc hp-spc-profil"  >
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
                                                <input name="email" id="email" type="email" class="box-p-spc"  >
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
                                                <input name="alamat" id="alamat" type="text" class="box-p-spc" >
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
                                                <input name="provinsi" id="provinsi" type="text" class="box-p-spc" > 
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
                                                <input name="kabupaten" id="kabupaten" type="text" class="box-p-spc" > 
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
                                                <input name="kecamatan" id="kecamatan" type="text" class="box-p-spc" >  
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
                                                <input name="desa" id="desa" type="text" class="box-p-spc" >  
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
                                                <img id="gambarnya" src="<?=base_url()?>/uploads/<?=$getidentitas[0]->gambar?>" alt="<?=$getidentitas[0]->gambar?>">
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
                                                <input name="username" id="username" type="text" class="box-p-spc"  >
                                                <div class="ex-user"></div>
                                            </div>
                                        </div> 
                                        <div class="password-spc">
                                            <div class="input-group"> 
                                                <span class="input-group-addon"> 
                                                    <i class="material-icons">lock_outline</i> 
                                                </span> 
                                                <div  > 
                                                    <label class="switch"> 
                                                        <input type="checkbox" id="showpass" name ="checkbox" > 
                                                        <span class="slider round"></span>  
                                                    </label> 
                                                </div>  
                                            </div>  

                                            <div class="input-group " id="opn-pass" style="margin-top: -15px;"> 
                                                <span class="input-group-addon"> 

                                                    <div style="width:25px"></div> 
                                                </span>
                                                <div class="form-group label-spcs password-spc"> 
                                                    <label class="control-label">Password 
                                                        <small>(required)</small> 
                                                    </label> 
                                                    <input name="password" id="password" type="text" class="box-p-spc">  
                                                </div> 
                                            </div>
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
                                <?php  echo session()->getFlashdata('pesan_profil'); ?> 
                        </div>  
                        <hr class="hr-alert-modal">
                        <div class="modal-footer">  
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        </div> 
                    </div>
                </div>
            </div>