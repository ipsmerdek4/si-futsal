
                <div class="container-fluid">  
                    <br><br><br>


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
                                         
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="../../img/slide2.jpg" alt="..." style="width:100%;"> 
                                    <div class="carousel-caption">
                                       
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

 
                </div>