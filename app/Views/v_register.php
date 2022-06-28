<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>

    
    <!--  my add CSS    -->
    <link href="<?=base_url()?>/assets/css/build.css" rel="stylesheet" /> 
    <!-- Bootstrap core CSS     -->
    <link href="<?=base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?=base_url()?>/assets/css/material-dashboard.css" rel="stylesheet" /> 
    
    <!--     Fonts and icons     -->
    <link href="<?=base_url()?>/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=base_url()?>/assets/css/google-roboto-300-700.css" rel="stylesheet" />

    <link href="<?=base_url()?>/intl-tel-input-master/build/css/intlTelInput.css" rel="stylesheet" />
    <link href="<?=base_url()?>/select2-4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <style> 
                .main-panel { 
                    width: calc(100% - 0px); 
                }
                .control-address{
                    height:90px;  
                }

                @media only screen and (max-width: 1000px) { 


                }
                @media only screen and (max-width: 430px) {    
                    .control-address{
                        height:50px;   
                    }
                    .control-wizard-title{ 
                        padding: 35px !important;
                    }
                }
                @media only screen and (max-width: 395px) {   

                    
                }
                @media only screen and (max-width: 320px) {     
                    .control-wizard-title{ 
                        padding: 15px !important; 
                    } 
                    .control-wizard-title>h3{  
                        font-size: 20px;
                    }
                    .control-wizard-title>h5{  
                        font-size: 12px;
                    }
                    
                }


    </style>

</head>
<body>
 
 

    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="../../img/lapangan_futsal.gif">
           
        
        
            <div class="content" >
                <div class="container-fluid">
                    <div class="col-sm-8 col-sm-offset-2">

 
                        <!--      Wizard container        -->
                        <div class="wizard-container" style="margin-top:-100px;">
                            <div class="card wizard-card" data-color="rose" id="wizardProfile"> 
                                

                                <form action="register/d" method="post" enctype="multipart/form-data">
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    <div class="wizard-header control-wizard-title">
                                        <h3 class="wizard-title">
                                            <b>Memulai Membuat Profile Anda</b>
                                        </h3>
                                        <h5>Informasi ini akan memberi tahu kami tentang Anda.</h5>  
                                    </div> 

                                    

                                    <div class="wizard-navigation">
                                        <ul>
                                            <li class="wizard-li">
                                                <a href="#about" data-toggle="tab">Tentang Anda</a>
                                            </li>
                                            <li class="wizard-li">
                                                <a href="#account" data-toggle="tab">Account Anda</a>
                                            </li>
                                            <li class="wizard-li">
                                                <a href="#address" data-toggle="tab">Alamat Anda</a>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                    <div class="tab-content"> 
                                        <div class="tab-pane" id="about">
                                            <div class="row">   

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


                                                <div class="col-sm-4 col-sm-offset-1">
                                                    <div class="picture-container">
                                                        <div class="picture">
                                                            <img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title="" />
                                                            <input name="gambarnya" type="file" id="wizard-picture" accept="image/*"/>
                                                        </div>
                                                        <h6>Pilih Gambar</h6>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">face</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Nama Lengkap
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="firstname" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">record_voice_over</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Nama Panggilan
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="lastname" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Email
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="email" type="email" class="form-control">
                                                        </div>
                                                    </div> 
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">phone_android</i>
                                                        </span>
                                                        <div class="form-group label-floating check-hp">
                                                            <label class="control-label">Nomer HP/Wa
                                                                <small>(required)</small>
                                                            </label>
                                                            <input type="text" name="hp" placeholder="81-234-567-890" id="phone1" class="form-control" >
 
                                                        </div>
                                                    </div> 
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="account"> 
                                            <div class="row">  
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">perm_identity</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Username
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="username" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">lock_outline</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Password
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="password" type="text" class="form-control">
                                                        </div>
                                                    </div> 
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">confirmation_number</i>
                                                        </span>
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Nama Tim
                                                                <small>(required)</small>
                                                            </label>
                                                            <input name="tim" type="text" class="form-control">
                                                        </div>
                                                    </div>   
                                                </div> 
                                            </div>
                                        </div>
                                        
                                        <div class="tab-pane" id="address">
                                            <div class="row"> 
                                                <div class="col-sm-7 col-sm-offset-1 control-address">
                                                    <div class="form-group  ">
                                                        <label class="control-label">Alamat</label>
                                                        <input name="alamat" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 control-address">
                                                    <div class="form-group  ">
                                                        <label class="control-label">Provinsi</label>
                                                        <input name="provinsi" id="provinsi" type="text" class="form-control"> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 col-sm-offset-1 control-address">
                                                    <div class="form-group  ">
                                                        <label class="control-label">Kabupaten</label>
                                                        <input name="kabupaten" id="kabupaten" type="text" class="form-control"> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-3 control-address">
                                                    <div class="form-group  ">
                                                        <label class="control-label">Kecamatan</label>
                                                        <input name="kecamatan" id="kecamatan" type="text" class="form-control"> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 control-address">
                                                    <div class="form-group  ">
                                                        <label class="control-label">Desa</label>
                                                        <input name="desa" id="desa" type="text" class="form-control"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                                            <input type='submit' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Daftar' />
                                        </div>
                                        <div class="pull-left">
                                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- wizard container -->
                    </div>
                </div>
            </div>
                




        </div>
    </div>
</body>


<!--   Core JS Files   -->
<script src="<?=base_url()?>/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>/assets/js/material.min.js" type="text/javascript"></script> 

 
<script src="<?=base_url()?>/assets/js/jquery.validate.min.js"></script>  
<script src="<?=base_url()?>/assets/js/jquery.bootstrap-wizard.js"></script>

 
<script src="<?=base_url()?>/intl-tel-input-master/build/js/intlTelInput.js"></script>
<script src="<?=base_url()?>/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>
 

<script src="<?=base_url()?>/select2-4.0.13/dist/js/select2.min.js"></script>

<script src="<?=base_url()?>/assets/js/sweetalert2.js"></script>  



<script type="text/javascript"> 
           
     

   
    $( ".close" ).click(function() {
        /* $( this ).hide(); */
        $(".alert-pass" ).hide();

    });


    $().ready(function() {
        $page = $('.full-page');
        image_src = $page.data('image');

        if(image_src !== undefined){
            image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
            $page.append(image_container);
        }

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
            $('.card2').removeClass('card-hidden');
        }, 500)
    });

   


        // Code for the Validator
        var $validator = $('.wizard-card form').validate({
    		  rules: {
    		    firstname: {
    		      required: true,
    		      minlength: 3
    		    },
    		    lastname: {
    		      required: true,
    		      minlength: 3
    		    },
    		    hp: {
    		      required: true,
    		      minlength: 9,
    		    },
    		    email: {
    		      required: true,
    		      minlength: 3,
    		    },
    		    username: {
    		      required: true,
    		      minlength: 3,
    		    },
    		    password: {
    		      required: true,
    		      minlength: 3,
    		    },
    		    tim: {
    		      required: true,
    		      minlength: 3,
    		    },
    		    alamat: {
    		      required: true,
    		      minlength: 3,
    		    },
    		    provinsi: {
    		      required: true, 
    		    },
    		    kabupaten: {
    		      required: true, 
    		    },
    		    kecamatan: {
    		      required: true, 
    		    },
    		    desa: {
    		      required: true, 
    		    },
            },

            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
                $('div.check-hp').addClass('has-error');
             }
    	});

        // Wizard Initialization
      	$('.wizard-card').bootstrapWizard({
            'tabClass': 'nav nav-pills',
            'nextSelector': '.btn-next',
            'previousSelector': '.btn-previous',

            onNext: function(tab, navigation, index) {
            	var $valid = $('.wizard-card form').valid();
            	if(!$valid) {
            		$validator.focusInvalid();
            		return false;
            	}
            },

            onInit : function(tab, navigation, index){

              //check number of tabs and fill the entire row
              var $total = navigation.find('li.wizard-li').length;
              $width = 100/$total;
              var $wizard = navigation.closest('.wizard-card');

              $display_width = $(document).width();

              if($display_width < 600 && $total > 3){
                  $width = 50;
              }

               navigation.find('li.wizard-li').css('width',$width + '%');
               $first_li = navigation.find('li.wizard-li:first-child a').html();
               $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
               $('.wizard-card .wizard-navigation').append($moving_div);
               refreshAnimation($wizard, index);
               $('.moving-tab').css('transition','transform 0s');
           },

            onTabClick : function(tab, navigation, index){
                var $valid = $('.wizard-card form').valid();

                if(!$valid){
                    return false;
                } else{
                    return true;
                }
            },

            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li.wizard-li').length;
                var $current = index+1;

                var $wizard = navigation.closest('.wizard-card');

                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $($wizard).find('.btn-next').hide();
                    $($wizard).find('.btn-finish').show();
                } else {
                    $($wizard).find('.btn-next').show();
                    $($wizard).find('.btn-finish').hide();
                }

                button_text = navigation.find('li.wizard-li:nth-child(' + $current + ') a').html();

                setTimeout(function(){
                    $('.moving-tab').text(button_text);
                }, 150);

                var checkbox = $('.footer-checkbox');

                if( !index == 0 ){
                    $(checkbox).css({
                        'opacity':'0',
                        'visibility':'hidden',
                        'position':'absolute'
                    });
                } else {
                    $(checkbox).css({
                        'opacity':'1',
                        'visibility':'visible'
                    });
                }

                refreshAnimation($wizard, index);
            }
      	});


        // Prepare the preview for profile picture
        $("#wizard-picture").change(function(){
            readURL(this);
        });

        $('[data-toggle="wizard-radio"]').click(function(){
            wizard = $(this).closest('.wizard-card');
            wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
            $(this).addClass('active');
            $(wizard).find('[type="radio"]').removeAttr('checked');
            $(this).find('[type="radio"]').attr('checked','true');
        });

        $('[data-toggle="wizard-checkbox"]').click(function(){
            if( $(this).hasClass('active')){
                $(this).removeClass('active');
                $(this).find('[type="checkbox"]').removeAttr('checked');
            } else {
                $(this).addClass('active');
                $(this).find('[type="checkbox"]').attr('checked','true');
            }
        });

        $('.set-full-height').css('height', 'auto');

         //Function to show image before upload

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(window).resize(function(){
            $('.wizard-card').each(function(){
                $wizard = $(this);
                index = $wizard.bootstrapWizard('currentIndex');
                refreshAnimation($wizard, index);

                $('.moving-tab').css({
                    'transition': 'transform 0s'
                });
            });
        });

        function refreshAnimation($wizard, index){
            total_steps = $wizard.find('li.wizard-li').length;
            move_distance = $wizard.width() / total_steps;
            step_width = move_distance;
            move_distance *= index;

            $current = index + 1;

            if($current == 1){
                move_distance -= 8;
            } else if($current == total_steps){
                move_distance += 8;
            }

            $wizard.find('.moving-tab').css('width', step_width);
            $('.moving-tab').css({
                'transform':'translate3d(' + move_distance + 'px, 0, 0)',
                'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

            });
        } 



    var inputtlp = document.querySelector("#phone1");
    window.intlTelInput(inputtlp, { 
        initialCountry: "id",
        separateDialCode: true,
        preferredCountries: ["id",], 
        allowDropdown:false,
        utilsScript: "<?=base_url()?>/intl-tel-input-master/build/js/utils.js",

    });

 
 $(document).ready(function(){ 
        
     $('.select-drop-input').select2();
    // Format nomor HP.
    $( '#phone1' ).mask('99-999-999-999');
    //load alamat
    $("#provinsi").change(function (){
        var url = "<?php echo site_url('register/add_ajax_kb');?>/"+$(this).val();
        $('#kabupaten').load(url);
        return false;
    })

    $("#kabupaten").change(function (){
        var url = "<?php echo site_url('register/add_ajax_kc');?>/"+$(this).val();
        $('#kecamatan').load(url);
        return false;
    })

    $("#kecamatan").change(function (){
        var url = "<?php echo site_url('register/add_ajax_de');?>/"+$(this).val();
        $('#desa').load(url);
        return false;
    })
})








</script>