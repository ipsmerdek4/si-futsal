

                
       

               


                <div class="row carousel-daftarskrang-v" style="margin: 0px 0 30px 0;">
                    <div class="col-lg-12 col-md-12 col-sm-12">   

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li> 
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner carousel-daftarskrang" role="listbox">
                            <div class="item active">
                                <img src="../../img/slide-no-info.gif" alt="..." style="width:100%;"> 
                                <div class="carousel-caption">
                                    <?php
                                        if ($dtlv == 1) {
                                    ?>
                                        <a href="<?=base_url()?>/jadwal" class="btn btn-primary start-me">Jadwal Hari ini</a>
                                    <?php
                                        }else{
                                    ?>
                                        <a href="<?=base_url()?>/register" class="btn btn-primary start-me">Daftar Sekarang</a>
                                    <?php        
                                        }
                                    ?> 
                                </div>
                            </div>
                            <div class="item">
                                <img src="../../img/slide2.jpg" alt="..." style="width:100%;"> 
                                <div class="carousel-caption">
                                    <?php
                                        if ($dtlv == 1) {
                                    ?>
                                        <a href="<?=base_url()?>/jadwal" class="btn btn-primary start-me">Jadwal Hari ini</a>
                                    <?php
                                        }else{
                                    ?>
                                        <a href="<?=base_url()?>/register" class="btn btn-primary start-me">Daftar Sekarang</a>
                                    <?php        
                                        }
                                    ?> 
                                </div>
                            </div> 
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>

    
                    </div>  
                </div> 

        

                <div class="row"> 
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats" style="border: 1px solid #bfbfbf">
                            <div class="card-header" data-background-color="green">
                                <i class="material-icons">monetization_on</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Price</p>
                                <h3 class="card-title" style="font-size:15px;font-weight:bold">
                                <?="Rp " . number_format($dataHarga[0]->harga,2,',','.')?>
                                </h3>
                            </div>
                            <div class="card-footer" style="border-top: 1px solid #bfbfbf">
                                <div class="stats">
                                    <i class="material-icons text-primary">last_page</i> 
                                    <div class="text-primary"><b>Harga Siang.</b></div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats" style="border: 1px solid #bfbfbf">
                            <div class="card-header" data-background-color="red">
                                <i class="material-icons">monetization_on</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Price</p>
                                <h3 class="card-title" style="font-size:15px;font-weight:bold">
                                <?="Rp " . number_format($dataHarga[1]->harga,2,',','.')?>
                                </h3>
                            </div>
                            <div class="card-footer" style="border-top: 1px solid #bfbfbf">
                                <div class="stats">
                                    <i class="material-icons text-primary">last_page</i> 
                                    <div class="text-primary"><b>Harga Malam.</b></div>     
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats" style="border: 1px solid #bfbfbf">
                            <div class="card-header" data-background-color="orange"> 
                                <i class="material-icons">bookmark</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Bookings</p>
                                <h3 class="card-title" style="font-size:15px;font-weight:bold">
                                <?php  
                                    $transnilai1 = 0; 
                                    foreach ($dataTransaksi as $v_dataTransaksi) {
                                        if ($v_dataTransaksi->booking_status != 9) {
                                            $transnilai1++; 
                                        }  
                                    }
                                    echo $transnilai1.'/16';
                                ?> 
                            </h3>
                            </div>
                            <div class="card-footer"  style="border-top: 1px solid #bfbfbf">
                                <div class="stats ">
                                    <i class="material-icons text-primary">last_page</i>
                                    <div class="text-primary"><b>Total Booking Hari ini.</b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats" style="border: 1px solid #bfbfbf">
                            <div class="card-header" data-background-color="rose">
                                <i class="material-icons">supervisor_account</i>
                            </div>
                            <div class="card-content">
                                <p class="category">Tims</p>
                                <h3 class="card-title" style="font-size:15px;font-weight:bold">
                                <?php
                                    $cek_total=0;
                                    foreach ($dataIdentitas as $v_dataIdentitas) {
                                       $cek_total++; 
                                    }
                                    echo $cek_total; 
                                ?>
                                </h3>
                            </div>
                            <div class="card-footer" style="border-top: 1px solid #bfbfbf">
                                <div class="stats">
                                    <i class="material-icons text-primary">last_page</i> 
                                    <div class="text-primary"><b>Total Tim Terdaftar.</b></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     
                 
                <div class="row" style="margin: -10px 0 0 0;" >
                    <div class="col-md-6 col-md-offset-3">
                        <div class="card card-chart " style="background: #f7f7f7">
                                    <div data-background-color="rose" >
                                        <p class="text-center h4"  >
                                            <?=date("d-M-Y")?>
                                        </p>  
                                        <hr>
                                        <p class="text-center h4" id="jam" >  
                                        </p>  

                                    </div>
                                    <br>
                                    


                                    <?php
                                        if ($dtlv == 1) {
                                    ?>       
                                    <div class="row">  
                                        <div class="col-md-3 col-xs-2 "  ></div>
                                        <div class="col-md-6 col-xs-8 "  >
                                            <a href="<?=base_url()?>/transaksi" class="btn btn-primary btn-block text-bokingnow"  >
                                                <span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span> 
                                                &nbsp;&nbsp;Booking Sekarang 
                                                <div class="ripple-container"></div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- 

                                    <div class="card-content">  
                                        <h4 class="card-title text-center">STATUS BOOKING</h4> 
                                    </div>
                                    <div class="card-footer " style="font-size: 15px;border-top:1px solid #ec407a" >
                                                                
                                        <span class="glyphicon glyphicon-calendar"  aria-hidden="true"></span> 
                                        <div class="h6">11-April-2022 12:00:00 WITA</div>  


                                        <button class="btn btn-success btn-xs" style="float: right;">
                                            <i class="material-icons">check</i> Approve
                                            <div class="ripple-container"></div>
                                        </button>

                                        <button class="btn btn-danger btn-xs" style="float: right;">
                                            <i class="material-icons">close</i> cancel
                                            <div class="ripple-container"></div>
                                        </button>   
                                    </div> 
                                    -->

                                    <?php
                                        }else{
                                    ?> 
                                    <div class="row">  
                                        <div class="col-md-3 col-xs-2 "  ></div>
                                        <div class="col-md-6 col-xs-8 "  >
                                            <a href="<?=base_url()?>/login" class="btn btn-primary btn-block"  >
                                                <span class="glyphicon glyphicon-qrcode" aria-hidden="true"></span> 
                                                &nbsp;&nbsp;Booking Sekarang 
                                                <div class="ripple-container"></div>
                                            </a>
                                        </div>
                                    </div> 
                                    <!-- 
                                    <div class="card-content">  
                                        <h4 class="card-title text-center">STATUS BOOKING</h4> 
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12 col-12 "  > 
                                            <hr style="margin :-7px 20px 0 20px; border:1px solid #ec407a">
                                        </div>
                                        <div class="col-md-4 col-xs-2 "  ></div>
                                        <div class="col-md-4 col-xs-8 "  >
                                            <a href="<?=base_url()?>/register" class="btn btn-info btn-block"  >
                                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;&nbsp;Daftar 
                                                <div class="ripple-container"></div>
                                            </a>
                                        </div>
                                    </div>

                                    -->
                                    <?php        
                                        } 
                                    ?>
 
                                    
                        </div>
                        
                    </div>
                </div>

                <div class="row" style="margin: -10px 0 0 0;" >
                    <div class="col-md-10 col-md-offset-1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.7781685804416!2d115.20949511460502!3d-8.712603593740742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2414000e5dd0f%3A0x3bd19c2e4689adee!2sNew%20Futsalholic%20Arena!5e0!3m2!1sen!2sid!4v1650691079502!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                    
                    </div>
                </div>