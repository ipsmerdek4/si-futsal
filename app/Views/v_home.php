

                
       

               


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
                                <h3 class="card-title" style="font-size:15px;font-weight:bold">Rp 140.000,-</h3>
                            </div>
                            <div class="card-footer" style="border-top: 1px solid #bfbfbf">
                                <div class="stats">
                                    <i class="material-icons text-primary">last_page</i> 
                                    <div class="text-primary">Harga Siang.</div>                                    
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
                                <h3 class="card-title" style="font-size:15px;font-weight:bold">Rp 240.000,-</h3>
                            </div>
                            <div class="card-footer" style="border-top: 1px solid #bfbfbf">
                                <div class="stats">
                                    <i class="material-icons text-primary">last_page</i> 
                                    <div class="text-primary">Harga Malam.</div>     
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
                                <h3 class="card-title" style="font-size:15px;font-weight:bold">24/24</h3>
                            </div>
                            <div class="card-footer"  style="border-top: 1px solid #bfbfbf">
                                <div class="stats ">
                                    <i class="material-icons text-primary">last_page</i>
                                    <div class="text-primary">Total Booking.</div>
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
                                <h3 class="card-title" style="font-size:15px;font-weight:bold">30</h3>
                            </div>
                            <div class="card-footer" style="border-top: 1px solid #bfbfbf">
                                <div class="stats">
                                    <i class="material-icons text-primary">last_page</i> 
                                    <div class="text-primary">Total Tim Terdaftar.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     
                 
                <div class="row" style="margin: -10px 0 0 0;" >
                    <div class="col-md-6 col-md-offset-3">
                        <div class="card card-chart " style="background: #f7f7f7">
                                    <div data-background-color="rose" >
                                        <p class="text-center h4"  >11-April-2022</p>  
                                        <hr>
                                        <p class="text-center h4"  >12:00:00 WITA</p>  

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


                                    <?php        
                                        } 
                                    ?>

                                    
                                    
                        </div>
                    </div>
                </div>


