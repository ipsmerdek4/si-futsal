 
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="../../img/lapangan_futsal.gif">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="green">
                                        <div class="card-title white">
                                            <img class="img" src="../../img/logo-2.png" alt="" style="width:50%">
                                            <hr style="margin:10px 0px;">
                                            <img class="img" src="../../img/logo 3.gif" alt="" style="width:100%">
                                        </div>  
                                    </div>

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

                                    <p class="category text-center">    
                                        <b style="letter-spacing:2px;">Login</b>
                                    </p>

                                    <form method="post" action="<?= base_url(); ?>/login/p">   
                                        <div class="card-content">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">face</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Username</label>
                                                    <input name="u_name" type="text" class="form-control">
                                                </div>
                                            </div> 
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Password</label>
                                                    <input name="p_name" type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-success btn-round">Masuk</button>
                                        </div>
                                    </form>


                                    <hr class="login-margin" >
                                    <div class="footer text-center col-md-6 col-md-offset-3 ">
                                        <a class=" btn btn-primary btn-block ">Daftar</a>
                                    </div>
                                </div>
                        </div> 
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>