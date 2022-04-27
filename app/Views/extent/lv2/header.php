<!doctype html>
<html lang="en"> 
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
  
    <!-- Bootstrap core CSS     -->
    <link href="<?=base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="<?=base_url()?>/assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?=base_url()?>/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="<?=base_url()?>/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="<?=base_url()?>/assets/css/google-roboto-300-700.css" rel="stylesheet" />


    
    <style>  
        .loader-wrapper {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #242f3f;
            display:flex;
            justify-content: center;
            align-items: center;
            z-index: 99;
        }
        .loader {
            display: inline-block;
            width: 30px;
            height: 30px;
            position: relative;
            border: 4px solid #Fff;
            animation: loader 2s infinite ease;
        }
        .loader-inner {
            vertical-align: top;
            display: inline-block;
            width: 100%;
            background-color: #fff;
            animation: loader-inner 2s infinite ease-in;
        }

        @keyframes loader {
            0% { transform: rotate(0deg);}
            25% { transform: rotate(180deg);}
            50% { transform: rotate(180deg);}
            75% { transform: rotate(360deg);}
            100% { transform: rotate(360deg);}
        }

        @keyframes loader-inner {
            0% { height: 0%;}
            25% { height: 0%;}
            50% { height: 100%;}
            75% { height: 100%;}
            100% { height: 0%;}
        }
        /* end lodding in  */


        .notif-spc{ 
            padding-top: 14px !important;
            padding-bottom: 10px !important;
            margin-right: 10px;
        }
        .logout-spc{ 
            padding-top: 15px !important;
            padding-bottom: 12px !important;
            border: 1px solid red;
            color: red !important;
        } 
        .logout-spc:hover{

        }
        .text-logout-spc{ 
            float:right;
            margin : -3px 0 0 0 !important;
            text-transform: capitalize;
            font-weight : bold;
            letter-spacing: 1px;

        } 
        .ico-logout-spc{ 
            float:left;
            margin : 0 0 0 0; 
        }
        .end-logout-spc{ 
            content: "";
            clear: both;
            display: table;  
        }
        .nav-text-spc{ 
            letter-spacing: 2px ;
            font-weight: bold !important;
            color: black !important; 
        }

        /* msg notif */ 
        
        #msg-notif>li{ 
            list-style: none !important;
            margin : 0 5px 0 -35px !important; 
            padding:  10px 0 10px 0 !important;
            color: black !important; 
            width: 200px; 
        }
        #msg-notif>li:hover{      
        }
        #msg-notif>li::after{ clear: both; }
        #msg-notif>li>a{ 
                cursor: default;
            text-align: center;
            color: black !important;  
            border: none;
            background: none;
            margin : 0 0 0 0 !important;
        }
        #msg-notif>li>a>i{
            float:left !important; 
            margin: 0 0 0 15px !important;
        } 
        #msg-notif>li>a>b{
            float:left !important;
            margin: -20px 0 0 10px !important; 
        } 
        #msg-notif>li>a:hover{
            border : none;
            border-radius: 0px !important; 
            background: none;
            box-shadow: none;   
        }
        .msg-notif-all{
            width: 200px;
        }
        .msg-notif-all>i{  
            float: left;
            margin: 0 0 0 40px; 
        }
        .msg-notif-all>b{ 
            float: left;
            margin: 3px 0 0 5px; 
        }
        .clear{ 
            clear: both;  
        }  
        .dropdown-menu>hr{
            margin: 15px 0 4px 0;
            border-top: 1px solid #9c27b0; 
        }



        @media only screen and (max-width: 1050px) {   
            .nav-text-spc{  
                letter-spacing: 2px ;
                font-weight: bold !important;
                color: black !important; 
                margin: 0 !important;
                width: 80%;
                padding : 0px; 
                height: 100px !important;
                
            }
            .navbar-collapse-spc{ 
                margin-top: -80px;
            }
        }

        @media only screen and (max-width: 770px) {    
            .text-logout-spc{ 
                float:none;
                margin : -3px 0 0 0 !important;
                text-transform: capitalize;
                font-weight : normal;
                letter-spacing: 0px;

            } 
            #msg-notif>li>a>i{   
                margin: 0 0 0 25px !important;
            } 
            #msg-notif>li>a>b{  
                color: white;
                margin: -17px 0 0 10px !important;  
            } 

            .msg-notif-all:hover{
                background: #9c27b0 !important;
            }
            .msg-notif-all>i{ 
                float: left;
                margin: 0 0 0 40px; 
            }
            .msg-notif-all>b{ 
                float: left;
                margin: 5px 0 0 -10px; 
            }
            /*  */
            .text-logout-spc{  
                color:white !important;
                margin-top:0px !important;
                font-weight: bold;
                letter-spacing: 2px;
            } 
            .ico-logout-spc{  
                color:white !important;
            }

        }

        @media only screen and (max-width: 430px) {   
            
            .nav-text-spc{ 
                letter-spacing: 2px ;
                font-weight: bold !important;
                color: black !important;
                width: 80%;
                padding-bottom: 130px !important; 
            } 
        }

    </style>

<?php        
    $menuselect1        = ""; 
    $menuselect3        = "";  
    $menuselect4        = "";
    $menuselect41       = "";
    $menuselect42       = "";
    $menuselect43       = "";
    if ($menu == "1b") { 
        $menuselect1 = "active";
     



    }elseif ($menu == "1c"){ 
      $menuselect3 = "active"; 
?>
        <link href='<?=base_url()?>/datatables/Buttons-2.2.2/css/buttons.dataTables.css' rel='stylesheet' type='text/css' />

        <link href="<?=base_url()?>/select2-4.0.13/dist/css/select2.min.css" rel="stylesheet" />

        <style>
                /*  */
                .card-title-spc>hr{
                    border-top: 3px solid red;
                    margin: 0 0 0 0;
                    width:100%;
                }
                .title-spc{
                    font-weight: bold;
                    letter-spacing: 1px; 
                      text-transform: uppercase;

                }
                
                /* tangal edit */
                .date-input-jadwal>.form-group{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding : 0 10px 3px 10px ;
                    margin: -10px 0 0 0 !important;
                }
                .date-input-jadwal>.form-group>input{
                    text-align: center;  
                    letter-spacing: 2px; 
                }
                .bootstrap-datetimepicker-widget{ 
                    z-index: 9999;
                }
                
                .date-button-jadwal>button{
                    margin: -10px 0 0 0 !important;
                    width:100%;
                    font-size: 12px;
                    letter-spacing: 2px;
                    font-weight:bold;
                    text-transform: capitalize;
                }
                /* data tabeles  */ 
                .table-spc>thead>tr>th{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 16px !important;
                    font-weight: bold;
                    padding: 15px !important;
                } 
                .table-spc>tbody>tr>td{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 14px !important;
                }
                #jadwal_lv2_length>label{ 
                    margin:  10px 0 0px 0;
                    padding: 3px 8px 3px 8px !important;
                    letter-spacing: 1px;
                    font-weight: bold;
                    color:#9c27b0;
                }

                #jadwal_lv2_length>label>select{ 
                    border: 1px solid #9c9c9c !important;
                    margin: -5px 5px 0 5px;
                    padding: 5px 5px 5px 20px;
                    
                }

                #jadwal_lv2_filter>label{
                    margin : 13px 0 0 0 !important; 
                    color:#9c27b0;
                    font-weight: bold;
                }
                #jadwal_lv2_filter>label>input{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding: 0 10px 0 10px; 
                    margin:  0 0 0 10px;
                }
                /* end data tabeles  */
                
                
                .select2-container .select2-selection   { 
                    border: none;  
                    border-radius: 0 !important;
                    border-bottom: 1px solid #D2D2D2; 
                    height: 35px;
                    letter-spacing: 1px;
                    padding-top:3px; 
                    collor: #9c27b0;
                }  
                .select2-container .select2-selection--single .select2-selection__arrow {
                    height: 25px;
                    top: 50%;
                    transform: translateY(-50%);
                    right: 2px;
                    width: 10px;   
                    display: flex;
                    align-items: center;
                    justify-content: center; 
                }
                /* modal alert */
                .modal-alert-spc{
                    border: 1px solid #ffcc12;
                }
                .modal-alert-spc>.modal-header{ 
                        margin: 0 0 0 0;                
                }
                .modal-alert-spc>.modal-header>h4{  
                        color: #ff9800;
                        font-weight: bold !important;        
                        letter-spacing: 1px;        
                }
                .modal-alert-spc>.modal-header>hr{ 
                    border-top: 1px solid #ffcc12;
                    margin: 10px 0 0 0;
                } 
                .modal-alert-spc>.modal-body{
                    color: black !important;
                    letter-spacing: 1px;
                }
                .hr-alert-modal{
                    border-top: 1px solid #ffcc12;
                    width: 85%;
                    margin: 20px auto 0 auto;
                }
                /* end alert model */
                /*  */
                .select-drop-jdwl-edit{
                    border: 1px solid #4caf50;
                    color: #4caf50;
                    font-weight: bold;
                    letter-spacing:1px;
                    margin: 10px ;
                    padding: 10px;
                    width:90%;
                }
                .b-jdwl-edit{ 
                    border: 1px solid #b5b5b5;
                    color: #b5b5b5;
                    font-weight: bold;
                    letter-spacing:1px;
                    margin: 10px ;
                    padding: 10px;
                    width:90%;
                }


        </style>





<?php    
    }elseif ($menu == "1d"){ 
        $menuselect4 = "active";
        $menuselect41 = "in"; 
        $menuselect42 = "active"; 
?>

        <link href='<?=base_url()?>/datatables/Buttons-2.2.2/css/buttons.dataTables.css' rel='stylesheet' type='text/css' />
        
        <style>
                /*  */
                .card-title-spc>hr{
                    border-top: 3px solid red;
                    margin: 0 0 0 0;
                    width:100%;
                }
                .title-spc{
                    font-weight: bold;
                    letter-spacing: 1px; 
                    text-transform: uppercase; 
                }

                /* data tabeles  */ 
                .table-spc>thead>tr>th{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 16px !important;
                    font-weight: bold;
                    padding: 15px !important;
                } 
                .table-spc>tbody>tr>td{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 14px !important;
                }
                #transaksi_booking_length>label{ 
                    margin:  10px 0 0px 0;
                    padding: 3px 8px 3px 8px !important;
                    letter-spacing: 1px;
                    font-weight: bold;
                    color:#9c27b0;
                }

                #transaksi_booking_length>label>select{ 
                    border: 1px solid #9c9c9c !important;
                    margin: -5px 5px 0 5px;
                    padding: 5px 5px 5px 20px;
                    
                }

                #transaksi_booking_filter>label{
                    margin : 13px 0 0 0 !important; 
                    color:#9c27b0;
                    font-weight: bold;
                }
                #transaksi_booking_filter>label>input{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding: 0 10px 0 10px; 
                    margin:  0 0 0 10px;
                }
                /* end data tabeles  */

                /* tangal edit */
                .date-input-jadwal>.form-group{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding : 0 10px 3px 10px ;
                    margin: -10px 0 0 0 !important;
                }
                .date-input-jadwal>.form-group>input{
                    text-align: center;  
                    letter-spacing: 2px; 
                }
                .bootstrap-datetimepicker-widget{ 
                    z-index: 9999;
                }
                
                .date-button-jadwal>button{
                    margin: -10px 0 0 0 !important;
                    width:100%;
                    font-size: 12px;
                    letter-spacing: 2px;
                    font-weight:bold;
                    text-transform: capitalize;
                }
                /*  */

                @media only screen and (max-width: 1000px) {    
                    .date-button-jadwal>button{
                        margin: 5px 0 0 0 !important;
                        width:100%;
                        font-size: 12px;
                        letter-spacing: 2px;
                        font-weight:bold;
                        text-transform: capitalize;
                    }
                    .date-input-jadwal>.form-group{
                        border: 1px solid #9c9c9c  !important;
                        border-radius: 5px;
                        padding : 0 10px 3px 10px ;
                        margin: 4px 0 0 0 !important
                    }
                    
                }

                @media only screen and (max-width: 395px) {  
                    #transaksi_booking_filter>label>input{ 
                        float:left;
                        width:100%; 
                        margin: 0 0 0 0;
                    }   
                    .table-spc>thead>tr>th{  
                        text-align: center;
                    } 
                    .table-spc>tbody>tr>td>ul>li{  
                        text-align: left !important;   
                        margin-left: -10px !important; 
                    } 

                    
                }

        </style>

<?php
    }elseif ($menu == "1e"){ 
        $menuselect4 = "active";
        $menuselect41 = "in"; 
        $menuselect43 = "active"; 
?>

        <link href='<?=base_url()?>/datatables/Buttons-2.2.2/css/buttons.dataTables.css' rel='stylesheet' type='text/css' />


        <style>
                /*  */
                .card-title-spc>hr{
                    border-top: 3px solid red;
                    margin: 0 0 0 0;
                    width:100%;
                }
                .title-spc{
                    font-weight: bold;
                    letter-spacing: 1px; 
                      text-transform: uppercase;

                }


                /* tangal edit */
                .date-input-jadwal>.form-group{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding : 0 10px 3px 10px ;
                    margin: -10px 0 0 0 !important;
                }
                .date-input-jadwal>.form-group>input{
                    text-align: center;  
                    letter-spacing: 2px; 
                }
                .bootstrap-datetimepicker-widget{ 
                    z-index: 9999;
                }
                
                .date-button-jadwal>button{
                    margin: -10px 0 0 0 !important;
                    width:100%;
                    font-size: 12px;
                    letter-spacing: 2px;
                    font-weight:bold;
                    text-transform: capitalize;
                }
                
                /* data tabeles  */ 
                .table-spc>thead>tr>th{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 16px !important;
                    font-weight: bold;
                    padding: 15px !important;
                } 
                .table-spc>tbody>tr>td{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 14px !important;
                }
                #transaksi_pembayaran_length>label{ 
                    margin:  10px 0 0px 0;
                    padding: 3px 8px 3px 8px !important;
                    letter-spacing: 1px;
                    font-weight: bold;
                    color:#9c27b0;
                }

                #transaksi_pembayaran_length>label>select{ 
                    border: 1px solid #9c9c9c !important;
                    margin: -5px 5px 0 5px;
                    padding: 5px 5px 5px 20px;
                    
                }

                #transaksi_pembayaran_filter>label{
                    margin : 13px 0 0 0 !important; 
                    color:#9c27b0;
                    font-weight: bold;
                }
                #transaksi_pembayaran_filter>label>input{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding: 0 10px 0 10px; 
                    margin:  0 0 0 10px;
                }
                /* end data tabeles  */

                /* modal view picture */

                /* Style the Image Used to Trigger the Modal */
                #myImg {
                    border-radius: 5px;
                    cursor: pointer;
                    transition: 0.3s;
                }

                #myImg:hover {opacity: 0.7;}

                /* The Modal (background) */
                .modal-picture {
                    display: none; /* Hidden by default */
                    position: fixed; /* Stay in place */
                    z-index: 1; /* Sit on top */
                    padding-top: 100px; /* Location of the box */
                    left: 0;
                    top: 0;
                    width: 100%; /* Full width */
                    height: 100%; /* Full height */
                    overflow: auto; /* Enable scroll if needed */
                    background-color: rgb(0,0,0); /* Fallback color */
                    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
                }

                /* Modal Content (Image) */
                .modal-content-picture {
                    margin: auto;
                    display: block;
                    width: 70%;
                }

                /* Caption of Modal Image (Image Text) - Same Width as the Image */
                #caption {
                    margin: auto;
                    display: block;
                    width: 80%;
                    max-width: 700px;
                    text-align: center;
                    color: #ccc;
                    padding: 10px 0;
                    height: 150px;
                }

                /* Add Animation - Zoom in the Modal */
                .modal-content-picture, #caption {
                    animation-name: zoom;
                    animation-duration: 0.6s;
                }

                @keyframes zoom {
                    from {transform:scale(0)}
                    to {transform:scale(1)}
                }

                /* The Close Button */
                .closeX {
                    position: absolute;
                    top: 15px;
                    right: 35px;
                    color: #f1f1f1;
                    font-size: 40px;
                    font-weight: bold;
                    transition: 0.3s;
                }

                .closeX:hover,
                .closeX:focus {
                    color: #bbb;
                    text-decoration: none;
                    cursor: pointer;
                }

             
                /* end view picture */

                /* modal konfirmasi pembayaran */
                .text-modal-spc{
                    width:100% !important;
                }
                .text-modal-spc>h5{ 
                    text-align: center !important; 
                    font-size: 14px;
                    letter-spacing : 1px;
                }
                .text-modal-spc>._file>input{ 
                    width: 100%;
                    padding:5px;
                    border: 1px solid #b3b3b3;
                    text-align: center !important; 
                    font-size: 14px;
                    letter-spacing : 1px;
                }
                .hr-modal-spc{
                    border-top: 1px solid #b3b3b3;
                    width: 85%;
                    margin: 20px auto 0 auto;
                }

                /* end modal konfirmasi pembayaran */
                /* modal alert */
                .modal-alert-spc{
                    border: 1px solid #ffcc12;
                }
                .modal-alert-spc>.modal-header{ 
                        margin: 0 0 0 0;                
                }
                .modal-alert-spc>.modal-header>h4{  
                        color: #ff9800;
                        font-weight: bold !important;        
                        letter-spacing: 1px;        
                }
                .modal-alert-spc>.modal-header>hr{ 
                    border-top: 1px solid #ffcc12;
                    margin: 10px 0 0 0;
                } 
                .modal-alert-spc>.modal-body{
                    color: black !important;
                    letter-spacing: 1px;
                }
                .hr-alert-modal{
                    border-top: 1px solid #ffcc12;
                    width: 85%;
                    margin: 20px auto 0 auto;
                }
                /* end alert model */





                @media only screen and (max-width: 1000px) {    
                    .date-button-jadwal>button{
                        margin: 5px 0 0 0 !important;
                        width:100%;
                        font-size: 12px;
                        letter-spacing: 2px;
                        font-weight:bold;
                        text-transform: capitalize;
                    }
                    .date-input-jadwal>.form-group{
                        border: 1px solid #9c9c9c  !important;
                        border-radius: 5px;
                        padding : 0 10px 3px 10px ;
                        margin: 4px 0 0 0 !important
                    }
                    
                }




                 @media only screen and (max-width: 395px) {  
                    #transaksi_pembayaran_filter>label>input{ 
                        float:left;
                        width:100%; 
                        margin: 0 0 0 0;
                    }   
                    .table-spc>thead>tr>th{  
                        text-align: center;
                    } 
                    .table-spc>tbody>tr>td>ul>li{  
                        text-align: left !important;   
                        margin-left: -10px !important; 
                    } 

                    
                }



        </style>





<?php
    }
?>




</head>

<body>



<?php if (!empty(session()->getFlashdata('logingo'))) : ?>
    <!-- loding screen -->
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <!--  -->
 <?php endif; ?> 


    <div class="wrapper">
        <div class="sidebar" data-active-color="purple" data-background-color="black"  >
     
            <div class="logo">
                <a href="<?=base_url()?>" class="simple-text">
                    Si-Futsal
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="<?=base_url()?>" class="simple-text">
                    SF
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="../img/lapangan_futsal-3.gif" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            PETUGAS
                         </a> 
                    </div>
                </div>
                <ul class="nav">
                    <li class="<?=$menuselect1?>">
                        <a href="<?=base_url()?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li> 
                    <li class=" ">
                        <a href="<?=base_url()?>">
                            <i class="material-icons">group</i>
                            <p>Data Pelanggan</p>
                        </a>
                    </li> 
                    <li class="<?=$menuselect3?>">
                        <a href="<?=base_url()?>/jadwal">
                            <i class="material-icons">assignment</i>
                            <p>Data Penjadwalan</p>
                        </a>
                    </li> 
                    

                    <li class="<?=$menuselect4?>">
                        <a data-toggle="collapse" href="#transaksi">
                            <i class="material-icons">assignment_turned_in</i>
                            <p>Data Transaksi
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse <?=$menuselect41?>" id="transaksi">
                            <ul class="nav">
                                <li class="<?=$menuselect42?>">
                                    <a href="<?=base_url()?>/transaksi_booking">Transaksi Booking</a>
                                </li>
                                <li class="<?=$menuselect43?>">
                                    <a href="<?=base_url()?>/transaksi_pembayaran">Transaksi Pembayaran</a>
                                </li> 
                            </ul>
                        </div>
                    </li>

                    <li class=" ">
                        <a href="<?=base_url()?>">
                            <i class="material-icons">attachment</i>
                            <p>Laporan Transaksi</p>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>



                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand nav-text-spc" href="<?=base_url()?>"> SISTEM INFORMASI PENJADWALAN SEWA LAPANGAN FUTSAL</a>
                    </div>
                    <div class="collapse navbar-collapse ">
                        <ul class="nav navbar-nav navbar-right navbar-collapse-spc">  
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle notif-spc"   data-toggle="dropdown"  >
                                    <i class="material-icons">notifications</i>
                                    <span class="notification" id="notif"> </span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <style>


                                </style>
                                <ul class="dropdown-menu">  
                                    <li > 
                                        <ul id="msg-notif"><!--  --></ul>
                                    </li>
                                    <hr>
                                    <li>
                                        <a href="<?=base_url()?>/transaksi_pembayaran" class="msg-notif-all" style="text-align: center;"> 
                                            <i class="material-icons">aspect_ratio</i>
                                            <b>View All </b>
                                            <div class="clear"></div> 
                                        </a>
                                    </li>
                                </ul> 

                            </li>

                            <li>
                                <a href="<?=base_url()?>/logout" class="logout-spc"  >
                                    <i class="material-icons ico-logout-spc">exit_to_app</i>
                                    <p class="text-logout-spc">Logout</p>
                                    <div class="end-logout-spc"></div>
                                </a>
                            </li>
                        </ul> 
                    </div>  
                </div>
            </nav>
            <div class="content">