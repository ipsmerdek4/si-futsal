<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>

 
    <!--  my add CSS    -->
    <link href="../../assets/css/build.css" rel="stylesheet" /> 
    <!-- Bootstrap core CSS     -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../assets/css/material-dashboard.css" rel="stylesheet" /> 
    
    <!--     Fonts and icons     -->
    <link href="../../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../../assets/css/google-roboto-300-700.css" rel="stylesheet" />
 

    <style>
        body {
            margin: 0;
            padding: 0;
            width:100vw;
            height: 100vh;
            background-color: #eee;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            width:100%;
            height:100%;
        }
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

        .icon-histori>.material-icons{ 
            font-size: 17px;
            margin: -3px -2px 0 -2px;
        }

        .ext-h5-spc{
            text-transform: capitalize;
            margin: 0 0 0 0;
        }



         @media only screen and (max-width: 1000px) {
            .icon-histori>.material-icons{ 
                font-size: 17px !important;
                margin: -8px -7px 0 -9px !important;
            }

            .ext-h5-spc{
                margin : -5px 0 0px 0 !important;
                text-transform: capitalize;
            }
            .top-spc{ 
                margin-top : 10px !important;
            }
            .bottom-spc{
                margin-bottom : 5px !important; 
            }

         }
    </style>



    <?php
        $menu2 = '';
        $menu3 = '';
        $menu4 = '';
        $classhide = '';

        if ($menu == '1b') {
             $menu2 = ' class="active"';
             $classhide = ' class="card "';
    ?>         
            <style> 
                .main-panel { 
                    width: calc(100% - 0px); 
                }
                
               

                ./* font-size ico meterialize */
                .tiny{font-size: 1rem; }
                .small{font-size:  2rem}
                .medium{font-size:  4rem}
                .large{font-size:  6rem}

 
                .verticalLine {
                   /*border-left: thick solid white;*/
                    border-left: 1px solid white;
                    margin: 0 5px 0 8px;
                    
                }  


              
                @media only screen and (max-width: 1000px) {
                    ul>li.verticalLine {
                        display: none;
                        margin-left: 0;
                        border-left: none;
                    }   
                    .carousel-daftarskrang>div>img {
                        border: 1px solid red;
                        height: 270px !important;
                    }
                    
                }
                @media only screen and (max-width: 430px) {
                       
                    .carousel-daftarskrang-v{
                        display: none;  
                    }
                    
                }
                @media only screen and (max-width: 395px) {
                    .text-bokingnow{
                        font-size:11px;
                    } 
                    .text-bokingnow>span{
                        margin-left: -8px;
                    }    
                    
                }
                @media only screen and (max-width: 376px) {
                    .text-bokingnow{
                        font-size:10px;
                    } 
                    .text-bokingnow>span{
                        margin-left: -8px;
                    }   
                    
                }
                @media only screen and (max-width: 320px) {
                    .text-bokingnow{
                        font-size:9px;
                    }
                    .text-bokingnow>span{
                        margin-left: -17px;
                    }   
                    
                }
                @media only screen and (max-width: 280px) {
                    .text-bokingnow{
                        font-size:7px;
                    }
                    .text-bokingnow>span{
                        margin-left: -20px;
                    }   
                    
                }
                
                
            </style> 

    <?php
        }elseif ($menu == '1c') {
           $menu3 = ' class="active"';
           $classhide = '';
    ?>         
 
            <link href='<?=base_url()?>/datatables/Buttons-2.2.2/css/buttons.dataTables.css' rel='stylesheet' type='text/css' />
            
            <style> 
                .main-panel { 
                    width: calc(100% - 0px); 
                }  
                 .verticalLine {
                   /*border-left: thick solid white;*/
                    border-left: 1px solid white;
                    margin: 0 5px 0 8px;
                } 
                .footer{
                    margin: -85px 30px 0 30px !important;
                }
                

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
                .material-datatables>hr{ 
                    border-top:3px solid #9c27b0;
                    margin: 10px 0 0 0;
                }
                .date-button-jadwal>button{
                    margin: -10px 0 0 0 !important;
                    width:100%;
                    font-size: 12px;
                    letter-spacing: 2px;
                    font-weight:bold;
                    text-transform: capitalize;
                }
                .table-jadwl>thead>tr>th{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 15px !important;
                    font-weight: bold;
                    padding: 15px !important;
                }
                
                .table-jadwl>thead>tr>th{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 15px !important;
                    font-weight: bold;
                    padding: 15px !important;
                }
                .table-jadwl>tbody>tr>td{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 14px !important;
                }
                #daftar_jdwl_wrapper>#daftar_jdwl_filter>label{
                    margin : 13px 0 0 0 !important; 
                    color:#9c27b0;
                    font-weight: bold;
                }
                #daftar_jdwl_wrapper>#daftar_jdwl_filter>label>input{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding: 0 10px 0 10px; 
                    margin:  0 0 0 10px;
                }
                .title-jadwal{
                        font-weight:bold;
                        letter-spacing: 1px;
                        color: #707070;
                        text-decoration: underline;
                        margin-bottom: 55px !important; 
                        text-transform: uppercase;
                }


                @media only screen and (max-width: 1000px) {
                    ul>li.verticalLine {
                        display: none;
                        margin-left: 0;
                        border-left: none;
                    }  
                    .date-input-jadwal>.form-group{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding : 0 10px 3px 10px ;
                    margin: 4px 0 0 0 !important
                    }
                    
                    .date-button-jadwal>button{
                        margin: 5px 0 0 0 !important;
                        width:100%;
                        font-size: 12px;
                        letter-spacing: 2px;
                        font-weight:bold;
                        text-transform: capitalize;
                    }

                 


                }
                @media only screen and (max-width: 430px) {   
                    .table-jadwl>thead>tr>th{  
                        text-align: center;
                    } 
                    .table-jadwl>tbody>tr>td>ul>li{ 
                        text-align: left; 
                        margin-left: -100px; 
                    } 
                    .title-jadwal{ 
                        margin-top: 50px !important;
                        margin-bottom: 25px !important;
                        text-align: center;
                    }


                    
                }
                @media only screen and (max-width: 395px) {  
                    #daftar_jdwl_wrapper>#daftar_jdwl_filter>label>input{ 
                        float:left;
                        width:100%; 
                        margin: 0 0 0 0;
                    }  
                    .table-jadwl>thead>tr>th{  
                        text-align: center;
                    } 
                    .table-jadwl>tbody>tr>td>ul>li{ 
                        text-align: left; 
                        margin-left: -10px; 
                    } 

                    
                }
                @media only screen and (max-width: 320px) {   
                    .table-jadwl>thead>tr>th{  
                        text-align: center;
                    } 
                    .table-jadwl>tbody>tr>td>ul>li{ 
                        text-align: left; 
                        margin-left: -25px; 
                    } 

                    
                }
            </style> 

    <?php
        }elseif ($menu == '1d') {
            $menu4 = ' class="active"'; 
            $classhide = '';
    ?> 
        <link href="<?=base_url()?>/select2-4.0.13/dist/css/select2.min.css" rel="stylesheet" />

            <style>
                .main-panel { 
                    width: calc(100% - 0px); 
                }  
                .verticalLine {
                    /*border-left: thick solid white;*/
                    border-left: 1px solid white;
                    margin: 0 5px 0 8px;
                }   
                .footer{
                    margin: -85px 30px 0 30px !important;
                }
                    

    
                .title-transaksi{
                        font-weight:bold;
                        letter-spacing: 1px;
                        color: #707070;
                        text-decoration: underline;
                        margin-bottom: 55px !important; 
                        text-transform: uppercase;
                }
                .text-warna{
                    color: #9c27b0;
                    font-weight:bold;
                    letter-spacing: 1px; 
                    margin: 7px 0 0 0 !important;
                    padding: 0 !important;
                } 
                .text-warna-spc{
                    padding-top: 3px !important; 
                }
                .label-floating{
                    margin:0 !important; 
                }
                .label-floating.label-floating-select{
                    padding-top: 13px;
                }
                .form-control-tks{
                    border: 1px solid #8e24aa;
                    border-radius: 5px;
                    width: 100%; 
                    line-height: 30px; 
                    letter-spacing: 2px;               
                    padding:0 6px 0 6px; 
                }
                .form-control-tks-disable{
                    border: 2px solid #999999;
                    border-radius: 5px;
                    width: 100%; 
                    line-height: 30px; 
                    letter-spacing: 2px;                 
                    padding:0 6px 0 6px; 
                    background-color: #e0e0e0
                } 
                .hr-color{
                    border-top: 1px solid #e91e63;
                }   
                .select2-container .select2-selection   { 
                    border: 1px solid #9c27b0; 
                    height: 35px;
                    letter-spacing: 2px;
                    padding-top:3px;
                }  

                .select2-container .select2-selection--single .select2-selection__arrow {
                height: 25px;
                top: 50%;
                transform: translateY(-50%);
                right: 2px;
                width: 25px;
                background-color: #9c27b0;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 5px 20px rgba(35, 49, 45, 0.14);
                }

                .select2-container--default .select2-selection--single .select2-selection__arrow b {
                border-color:#fff transparent transparent transparent !important;

                }
                .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b {
                border-color:transparent transparent #fff transparent !important;
                }

                .select2-container .select2-results__option--highlighted[aria-selected] {
                    background-color: #8e24aa;
                    color: white;
                }

                /* 
                .select2-container .select2-selection--single .select2-selection__arrow {
                    background-image: -khtml-gradient(linear, left top, left bottom, from(#9c27b0), to(#9c27b0));
                    background-image: -moz-linear-gradient(top, #9c27b0, #9c27b0);
                    background-image: -ms-linear-gradient(top, #9c27b0, #9c27b0);
                    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #9c27b0), color-stop(100%, #9c27b0));
                    background-image: -webkit-linear-gradient(top, #9c27b0, #9c27b0);
                    background-image: -o-linear-gradient(top, #9c27b0, #9c27b0);
                    background-image: linear-gradient(#9c27b0, #9c27b0);  
                    width: 30px;
                    color: #fff;
                    font-size: 1.3em;
                    padding: 4px 10px;
                    height: 35px;
                }
                */ 

                .button-trk-spc{
                    margin-top:-40px !important;
                }

                .check-spc{
                    border: 1px solid red;
                    border-radius: 5px;
                    padding: 15px; 
                }


     
                @media only screen and (max-width: 1000px) {   
                    ul>li.verticalLine {
                        display: none;
                        margin-left: 0;
                        border-left: none;
                    }  
                    .text-warna{
                        text-align: center !important;
                        margin-bottom: 5px !important;
                    }  
                    .text-warna-spc{
                        padding-top: 3px !important; 
                        margin-bottom: -5px !important;
                    }
                    .label-floating.label-floating-select{
                        padding-top: 55px;
                    }
                     .button-trk-spc{
                        margin-top:-20px !important;
                    }

                }
  
                @media only screen and (max-width: 430px) {   
                    
                    .title-transaksi{
                        margin-top: 50px !important;
                        margin-bottom: 25px !important;
                        text-align: center;
                    }


                    
                }
            </style>
    <?php    
        }elseif ($menu == '1e') {
            $menu4 = ' '; 
            $classhide = '';
    ?> 

            <link href='<?=base_url()?>/datatables/Buttons-2.2.2/css/buttons.dataTables.css' rel='stylesheet' type='text/css' />
             
            <style>
                .main-panel { 
                    width: calc(100% - 0px); 
                }  
                .verticalLine {
                    /*border-left: thick solid white;*/
                    border-left: 1px solid white;
                    margin: 0 5px 0 8px;
                }   
                .footer{
                    margin: -85px 30px 0 30px !important;
                }
                 .title-histori{
                        font-weight:bold;
                        letter-spacing: 1px;
                        color: #707070;
                        text-decoration: underline;
                        margin-bottom: 55px !important; 
                        text-transform: uppercase;
                }

                
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
                .material-datatables>hr{ 
                    border-top:3px solid #9c27b0;
                    margin: 10px 0 0 0;
                }
                .date-button-jadwal>button{
                    margin: -10px 0 0 0 !important;
                    width:100%;
                    font-size: 12px;
                    letter-spacing: 2px;
                    font-weight:bold;
                    text-transform: capitalize;
                }
                .table-histori>thead>tr>th{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 15px !important;
                    font-weight: bold;
                    padding: 15px !important;
                }
                .table-histori>tfoot>tr>th{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 15px !important;
                    font-weight: bold;
                    padding: 15px !important;
                }
                .table-histori>tbody>tr>td{ 
                    border : 1px solid #bbbdbb !important;
                    text-align: center;
                    font-size: 14px !important;
                }
                #daftar_history_wrapper>#daftar_history_filter>label{
                    margin : 13px 0 0 0 !important; 
                    color:#9c27b0;
                    font-weight: bold;
                }
                #daftar_history_wrapper>#daftar_history_filter>label>input{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding: 0 10px 0 10px; 
                    margin:  0 0 0 10px;
                }
                #all_history_wrapper>#all_history_filter>label{
                    margin : 13px 0 0 0 !important; 
                    color:#9c27b0;
                    font-weight: bold;
                }
                #all_history_wrapper>#all_history_filter>label>input{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding: 0 10px 0 10px; 
                    margin:  0 0 0 10px;
                }
                .title-jadwal{
                        font-weight:bold;
                        letter-spacing: 1px;
                        color: #707070;
                        text-decoration: underline;
                        margin-bottom: 55px !important; 
                        text-transform: uppercase;
                }
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
                    color: #ff9800 !important;
                }

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

                td.text-bold{
                    text-weight: bold !important;
                }

                @media only screen and (max-width: 1000px) {
                    .modal-content-picture {
                        width: 100%;
                    }
                    ul>li.verticalLine {
                        display: none;
                        margin-left: 0;
                        border-left: none;
                    }  
                    .date-input-jadwal>.form-group{
                    border: 1px solid #9c9c9c  !important;
                    border-radius: 5px;
                    padding : 0 10px 3px 10px ;
                    margin: 4px 0 0 0 !important
                    }
                    
                    .date-button-jadwal>button{
                        margin: 5px 0 0 0 !important;
                        width:100%;
                        font-size: 12px;
                        letter-spacing: 2px;
                        font-weight:bold;
                        text-transform: capitalize;
                    }

                 


                }
                @media only screen and (max-width: 430px) {   
                    .title-histori{
                        margin-top: 50px !important;
                        margin-bottom: 25px !important;
                        text-align: center;
                    }
                    .table-histori>thead>tr>th{  
                        text-align: center;
                    } 
                    .table-histori>tbody>tr>td>ul>li{ 
                        text-align: left; 
                        margin-left: -100px; 
                    } 
                    .title-jadwal{ 
                        margin-top: 50px !important;
                        margin-bottom: 25px !important;
                        text-align: center;
                    }


                    
                }
                @media only screen and (max-width: 395px) {  
                    #daftar_history_wrapper>#daftar_history_filter>label>input{ 
                        float:left;
                        width:100%; 
                        margin: 0 0 0 0;
                    }  
                    #all_history_wrapper>#all_history_filter>label>input{ 
                        float:left;
                        width:100%; 
                        margin: 0 0 0 0;
                    }  
                    .table-histori>thead>tr>th{  
                        text-align: center;
                    } 
                    .table-histori>tbody>tr>td>ul>li{ 
                        text-align: left; 
                        margin-left: -10px; 
                    } 

                    
                }
                @media only screen and (max-width: 320px) {   
                    .table-histori>thead>tr>th{  
                        text-align: center;
                    } 
                    .table-histori>tbody>tr>td>ul>li{ 
                        text-align: left; 
                        margin-left: -25px; 
                    } 

                    
                }

                 
            </style>
    <?php
        }
    ?>



</head>
<body style="background-image: url('../../img/lapangan_futsal.gif') ">
 


<?php    
 if (!empty(session()->getFlashdata('logingo'))) :  
?>
    <!-- loding screen -->
    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>
    <!--  -->
 <?php endif; ?> 




<div class="wrapper" >  
    <div class="main-panel"> 

    
        <nav class="navbar navbar-success navbar-fixed-top">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--  <a class="navbar-brand" href="#">
                    <img alt="Brand" src="../../img/logo1.gif"  style="width:70px;margin: -18px 0 0 0;">
                </a> -->
                <h6 class="navbar-text" style="margin-left: 30px; margin-right:60px;">
                    <img alt="Brand" src="../../img/logo 2.gif"  style="width:150px;height:100%; margin:-30px 0 -27px 0 ;">

                </h6>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               
                <?php 
                    if ($dtlv == 1) {
                ?>
                


                <ul class="nav navbar-nav ">
                    
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li> -->
                </ul>  


                
                <ul class="nav navbar-nav navbar-right" style="margin : 0 100px 0 0 ">
                    <li <?=$menu2?> >
                        <a href="/">
                            <div class="h6" style="margin: 3px 0;text-transform: capitalize; ">
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                &nbsp;&nbsp;Home
                            </div> 
                        </a>
                    </li>
                    <li <?=$menu3?> >
                        <a href="<?=base_url()?>/jadwal">
                            <div class="h6" style="margin: 3px 0;text-transform: capitalize;">
                                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                &nbsp;&nbsp;Jadwal
                            </div> 
                        </a>
                    </li>
                    <li <?=$menu4?> >
                        <a href="<?=base_url()?>/transaksi">
                            <div class="h6" style="margin: 3px 0;text-transform: capitalize;">
                                <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                &nbsp;&nbsp;Transaksi
                            </div> 
                        </a>
                    </li>
                    <li class="verticalLine" >
                        <div style="height:50px;">&nbsp;</div>
                    </li>
                    <li class="dropdown" >
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-weight: bold;text-transform: capitalize;">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            &nbsp;&nbsp;<?=$unm?> 
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        <div class="h6 ext-h5-spc top-spc"  >
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                            &nbsp;&nbsp;Profil
                                        </div> 
                                        
                                    </a>
                                </li>
                                <li>
                                    <a href="<?=base_url()?>/history"> 
                                        <div class="h6 icon-histori ext-h5-spc" style="">
                                            <i class="material-icons">history</i>
                                            &nbsp;&nbsp;Histori Transaksi
                                        </div>
                                    
                                    </a>
                                </li> 
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="<?=base_url()?>/logout">
                                        <div class="h6 ext-h5-spc bottom-spc" style=" ">
                                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                                            &nbsp;&nbsp;Logout
                                        </div> 
                                    </a>
                                </li>
                            </ul>
                    </li>
                    <!-- <li >

                        
                    </li>  -->
                </ul> 
                <?php
                    }else{
                ?>  
                <ul class="nav navbar-nav ">
                    
                </ul> 

                <ul class="nav navbar-nav navbar-right" style="margin : 0 100px 0 0 ">
                    <li <?=$menu2?>>
                        <a href="/">
                            <div class="h6" style="margin: 3px 0;text-transform: capitalize;">
                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                &nbsp;&nbsp;Home
                            </div> 
                        </a>
                    </li>  
                    <li>
                        <a href="<?=base_url()?>/login">
                            <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                            &nbsp;&nbsp;Jadwal
                        </a>
                    </li>  
                    <li class="verticalLine" >
                        <div style="height:50px;">&nbsp;</div>
                    </li>
                    <li class="">
                        <a href="<?=base_url()?>/login">
                            <div class="h6" style="margin: 3px 0;text-transform: capitalize ">
                                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                                &nbsp;&nbsp;login
                            </div> 
                        </a>
                    </li>
                    <li >
                        <a href="<?=base_url()?>/register">
                            <div class="h6" style="margin: 3px 0;text-transform: capitalize ">
                                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                &nbsp;&nbsp;Daftar
                            </div> 
                        </a>
                    </li> 
                </ul> 

 
                <?php
                    }
                ?>



            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


        
        <div class="container"   >   
            <div <?=$classhide?> style="padding:30px; margin: 100px 0 0 0">



