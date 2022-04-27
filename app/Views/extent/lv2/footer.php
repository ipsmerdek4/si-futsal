
 
            </div> 
 
        </div>
    </div> 
</body>
        <!--   Core JS Files   -->
        <script src="<?=base_url()?>/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>/assets/js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>/assets/js/material.min.js" type="text/javascript"></script>
        
 
     
        <script type="text/javascript"> 
            $(window).on("load",function(){
                $(".loader-wrapper").fadeOut(2000);
            });
  
            /*  */
            $(document).ready(function() {  
               setTimeout(function() { 
                    jumlah(); 
                    pesan(); 
                }, 200);

            }); 
   
            function jumlah() {
                $.getJSON("<?=base_url()?>/count_notif", function(datas) {
                    $("#notif").html(datas.jumlah);
                });
            }

            function pesan() {
                $.getJSON("<?=base_url()?>/msg_notif", function(data) {
                    $("#msg-notif").empty();
                    var no = 1;
                    $.each(data.result, function() {
                        $("#msg-notif").append('<li>'+
                                                    '<a>'+ 
                                                        '<i class="material-icons">mail</i>' +
                                                        '<b>' + this['kode_transaksi'] + '</b>' +
                                                    '</a>' +
                                                '</li>');
                    });
                });
            }

       
        </script>


<?php
    if ($menu == "1b") {   //home
?>

         <!--  Charts Plugin -->
        <script src="<?=base_url()?>/assets/js/chartist.min.js"></script>  
        
        <script src="<?=base_url()?>/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script> 
        <script src="<?=base_url()?>/assets/js/material-dashboard.js"></script> 
        

        <script type="text/javascript">
            $(document).ready(function() { 
        
                /* ----------==========     Daily Sales Chart initialization    ==========---------- */

                dataDailySalesChart = {
                    labels: ['M', 'T', 'W', 'T', 'F', 'S', 'S'],
                    series: [
                        [12, 17, 7, 17, 23, 18, 38]
                    ]
                };

                optionsDailySalesChart = {
                    lineSmooth: Chartist.Interpolation.cardinal({
                        tension: 0
                    }),
                    low: 0,
                    high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                    chartPadding: { top: 0, right: 0, bottom: 0, left: 0},
                }

                var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);

                md.startAnimationForLineChart(dailySalesChart);



                /* ----------==========     Completed Tasks Chart initialization    ==========---------- */

                dataCompletedTasksChart = {
                    labels: ['12p', '3p', '6p', '9p', '12p', '3a', '6a', '9a'],
                    series: [
                        [230, 750, 450, 300, 280, 240, 200, 190]
                    ]
                };

                optionsCompletedTasksChart = {
                    lineSmooth: Chartist.Interpolation.cardinal({
                        tension: 0
                    }),
                    low: 0,
                    high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
                    chartPadding: { top: 0, right: 0, bottom: 0, left: 0}
                }

                var completedTasksChart = new Chartist.Line('#completedTasksChart', dataCompletedTasksChart, optionsCompletedTasksChart);

                // start animation for the Completed Tasks Chart - Line Chart
                md.startAnimationForLineChart(completedTasksChart);


                /* ----------==========     Emails Subscription Chart initialization    ==========---------- */

                var dataWebsiteViewsChart = {
                labels: ['J', 'F', 'M', 'A', 'M', 'J', 'J', 'A', 'S', 'O', 'N', 'D'],
                series: [
                    [542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]

                ]
                };
                var optionsWebsiteViewsChart = {
                    axisX: {
                        showGrid: false
                    },
                    low: 0,
                    high: 1000,
                    chartPadding: { top: 0, right: 5, bottom: 0, left: 0}
                };
                var responsiveOptions = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                    }
                }]
                ];
                var websiteViewsChart = Chartist.Bar('#websiteViewsChart', dataWebsiteViewsChart, optionsWebsiteViewsChart, responsiveOptions);

                //start animation for the Emails Subscription Chart
                md.startAnimationForBarChart(websiteViewsChart);
        


            });
        </script>

<?php    
    }elseif ($menu == "1d") { //data transaksi booking

?>
        <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
        <script src="<?=base_url()?>/assets/js/moment.min.js"></script>
        <!-- DateTimePicker Plugin -->
        <script src="<?=base_url()?>/assets/js/bootstrap-datetimepicker.js"></script>
        <!--  Full Calendar Plugin    -->
        <script src="<?=base_url()?>/assets/js/fullcalendar.min.js"></script>
           <!--  DataTables.net Plugin    -->
        <script src="<?=base_url()?>/assets/js/jquery.datatables.js"></script>
        <script src='<?=base_url()?>/datatables/Buttons-2.2.2/js/dataTables.buttons.js' type='text/javascript'></script>
       
        
        <script src="<?=base_url()?>/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script> 
        <script src="<?=base_url()?>/assets/js/material-dashboard.js"></script> 
        


        <script type="text/javascript">
             
            $("#btn-transaksi-booking").click(function(){ 
                 window.location.href = '<?=base_url()?>/transaksi_booking/'+ $("#tgl-transaksi-booking").val(); 
            }); 
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';   
            $(document).ready(function() {     
                var tablen2 =  $('#transaksi_booking').DataTable({
                    /* dom: 'Bfrtip',  
                    buttons: [                      
                        {
                            text: '<i class="material-icons">arrow_back</i> <b>Kembali</b>',
                            className: 'btn btn-danger',
                            action: function ( e, dt, node, config ) {
                                window.location.href = '/transaksi_booking';
                                //$(node).removeClass('dt-button')
                               // alert( config );
                            }
                        }
                    ], */
                    responsive: true, 
                    lengthChange: true, 
                    autoWidth: false, 
                    paging: true,
                    language: {
                                search: "Pencarian :",
                    },  
                    columnDefs : [      
                                    {  
                                        targets: 0,
                                        className: ' text-sm-center',
                                        orderable: false,
                                        searchable: false,
                                        render: function (data, type, row, meta) {
                                            return meta.row + meta.settings._iDisplayStart + 1;
                                        }  
                                    }, 
                    ],   
                }); 
                /*  */


                $('.datetimepicker').datetimepicker({   
                    format: 'DD-MM-YYYY', 
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-chevron-up",
                        down: "fa fa-chevron-down",
                        previous: 'fa fa-chevron-left',
                        next: 'fa fa-chevron-right',
                        today: 'fa fa-screenshot',
                        clear: 'fa fa-trash',
                        close: 'fa fa-remove',
                        inline: true,
                    },        
                });

            });

        </script> 
<?php    
    }elseif ($menu == "1e") { //data transaksi booking
?>
        <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
        <script src="<?=base_url()?>/assets/js/moment.min.js"></script>
        <!-- DateTimePicker Plugin -->
        <script src="<?=base_url()?>/assets/js/bootstrap-datetimepicker.js"></script>
        <!--  Full Calendar Plugin    -->
        <script src="<?=base_url()?>/assets/js/fullcalendar.min.js"></script>
           <!--  DataTables.net Plugin    -->
        <script src="<?=base_url()?>/assets/js/jquery.datatables.js"></script>
        <script src='<?=base_url()?>/datatables/Buttons-2.2.2/js/dataTables.buttons.js' type='text/javascript'></script>
       
        
        <script src="<?=base_url()?>/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script> 
        <script src="<?=base_url()?>/assets/js/material-dashboard.js"></script> 

        <script type="text/javascript">
              
            $("#btn-transaksi-pembayaran").click(function(){ 
                 window.location.href = '<?=base_url()?>/transaksi_pembayaran/'+ $("#tgl-transaksi-pembayaran").val(); 
            }); 
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';   
            $(document).ready(function() {     

                <?php 
                if(session()->getFlashData('pesantrs_pembayaran')){
                ?> 
                    $('#alert_modalX').modal('show');   
                <?php
                }
                ?>
               

                var tablen2 =  $('#transaksi_pembayaran').DataTable({
                    
                    responsive: true, 
                    lengthChange: true, 
                    autoWidth: false, 
                    paging: true,
                    language: {
                                search: "Pencarian :",
                    },  
                    columnDefs : [      
                                    {  
                                        targets: 0,
                                        className: ' text-sm-center',
                                        orderable: false,
                                        searchable: false,
                                        render: function (data, type, row, meta) {
                                            return meta.row + meta.settings._iDisplayStart + 1;
                                        }  
                                    }, 
                    ],   
                }); 
                /*  */


                $('.datetimepicker').datetimepicker({   
                    format: 'DD-MM-YYYY', 
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-chevron-up",
                        down: "fa fa-chevron-down",
                        previous: 'fa fa-chevron-left',
                        next: 'fa fa-chevron-right',
                        today: 'fa fa-screenshot',
                        clear: 'fa fa-trash',
                        close: 'fa fa-remove',
                        inline: true,
                    },        
                });

 

            });

            /* click with id */
            $(document).on("click", ".btn-konfirmasi", function () {
                var access_val = $(this).data('id');
                var pecah_access_val = access_val.split("*");
                    if (pecah_access_val[1] == 1) {
                        if (pecah_access_val[2] == 1) {
                            if (pecah_access_val[3] == 1) {
                                $("#_access_FORM").attr("action", "<?=base_url()?>/transaksi_pembayaran/ajx_pembayaran");  
                            }else{
                                $("#_access_FORM").attr("action", "<?=base_url()?>/transaksi_pembayaran/ajx_pembayaran_dua");  
                            }
                            $(".title-spc-ajxpembayaran").html("<b>Konfirmasi Pembayaran</b>");
                            $(".text-modal-spc h5").html("Silahkan Upload Bukti Transfer di bawah ini : ");
                            $(".text-modal-spc ._file").html('<input type="file" name="buktimanual"  />');

                            $("#_access_val").val( pecah_access_val[0] );  
                          
                        }else if(pecah_access_val[2] == 2) {
                            $("#_access_FORM").attr("action", "<?=base_url()?>/transaksi_pembayaran/cancel_pembayaran_ajx");  
                            $(".title-spc-ajxpembayaran").html("<b>Cancel Pembayaran</b>");
                            $(".text-modal-spc h5").html("Apakah Anda Yakin ? <br>Prosess ini akan Membatalkan Prosess Booking Anda.");
                            $(".text-modal-spc ._file").html('');

                            $("#_access_val").val( pecah_access_val[0] );   
                        }
                    }else if(pecah_access_val[1] == 2) {
                            $("#_access_FORM").attr("action", "<?=base_url()?>/transaksi_pembayaran/ajx_approve_pembayaran");  
                            $(".title-spc-ajxpembayaran").html("<b>Konfirmasi Pembayaran</b>");
                            $(".text-modal-spc h5").html("Apakah Anda Sudah Menerima Pembayaran ? ");
                            $(".text-modal-spc ._file").html('');

                            $("#_access_val").val( pecah_access_val[0] );  
                    }else if(pecah_access_val[1] == 3) {
                            $("#_access_FORM").attr("action", "<?=base_url()?>/transaksi_pembayaran/ajx_token_pembayaran"); //Will set it
                            $(".title-spc-ajxpembayaran").html("<b>Token Pembayaran</b>");
                            $(".text-modal-spc h5").html("Masukan <b>TOKEN</b> (6 Karakter) dari Pelanggan : ");
                            $(".text-modal-spc ._file").html('<input type="text" name="_tkn_val">');

                            $("#_access_val").val( pecah_access_val[0] );  
                    }

               
            });

            /* modal picture */
             
            // Get the modal
            var modal = $("#myModal");
            var modalImg = modal.find('.modal-content-picture');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = $(".myImg");
            var captionBox = $("#caption");

            img.click(function() {
                modalImg.attr('src', $(this).attr('src'));
                captionBox.text( $(this).attr('alt') );
                modal.show();
            });

            // Get the elements that closes the modal
            var modalCloser = $(".closeX");

            // When the user clicks on the close element, close the modal
            modalCloser.click(function() {
                modal.hide();
            }); 

            /* end modal picture */


            


           



        </script> 

<?php    
    }elseif ($menu == "1c") { //data transaksi booking
?>
        <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
        <script src="<?=base_url()?>/assets/js/moment.min.js"></script>
        <!-- DateTimePicker Plugin -->
        <script src="<?=base_url()?>/assets/js/bootstrap-datetimepicker.js"></script>
        <!--  Full Calendar Plugin    -->
        <script src="<?=base_url()?>/assets/js/fullcalendar.min.js"></script>

         <!-- Select Plugin -->
        <script src="<?=base_url()?>/select2-4.0.13/dist/js/select2.min.js"></script>

        <!--  DataTables.net Plugin    -->
        <script src="<?=base_url()?>/assets/js/jquery.datatables.js"></script>
        <script src='<?=base_url()?>/datatables/Buttons-2.2.2/js/dataTables.buttons.js' type='text/javascript'></script>
       
        
        <script src="<?=base_url()?>/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script> 
        <script src="<?=base_url()?>/assets/js/material-dashboard.js"></script> 

        <script>
            $("#jadwaltagl").click(function(){ 
                 window.location.href = '<?=base_url()?>/jadwal/'+ $("#jadwaltaglval").val() + '*' + $("#lapnganval").val(); 
            }); 
            /*  */ 


            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';   
            $(document).ready(function() {    

                <?php if(session()->getFlashData('respon_bedaharga_lv2')){ ?> 
                    $('#_access_open').modal('show');   
                <?php  } ?>
                
                <?php if(session()->getFlashData('pesanbookinglv2')){ ?> 
                    $('#alert_modalX').modal('show');   
                <?php  } ?>
                /*  */
                $('.select-drop-input').select2({
                    minimumResultsForSearch: -1
                });
                /*  */
                var tablen2 =  $('#jadwal_lv2').DataTable({
                    dom: 'Bfrtip',  
                    buttons: [                      
                        {
                            text: '<b> <i class="material-icons">add_circle_outline</i> Booking</b>',
                            className: 'btn btn-danger',
                            action: function ( e, dt, node, config ) {
                                window.location.href = '/transaksi';
                                //$(node).removeClass('dt-button')
                               // alert( config );
                            }
                        }
                    ],
                    responsive: true, 
                    lengthChange: false, 
                    autoWidth: false, 
                    paging: false,
                    language: {
                                search: "Pencarian :",
                    },  
                    columnDefs : [      
                                    {  
                                        targets: 0,
                                        className: ' text-sm-center',
                                        orderable: false,
                                        searchable: false,
                                        render: function (data, type, row, meta) {
                                            return meta.row + meta.settings._iDisplayStart + 1;
                                        }  
                                    }, 
                    ],   
                }); 
                /*  */


                $('.datetimepicker').datetimepicker({   
                    format: 'DD-MM-YYYY', 
                    icons: {
                        time: "fa fa-clock-o",
                        date: "fa fa-calendar",
                        up: "fa fa-chevron-up",
                        down: "fa fa-chevron-down",
                        previous: 'fa fa-chevron-left',
                        next: 'fa fa-chevron-right',
                        today: 'fa fa-screenshot',
                        clear: 'fa fa-trash',
                        close: 'fa fa-remove',
                        inline: true,
                    },        
                });

 

            });


              /* click with id */
            $(document).on("click", ".btn-konfirmasi", function () { 
                 var access_val = $(this).data('id');
                $.post("<?=base_url()?>/jadwal/c",
                {
                    access_val: access_val,
                },
                function(data, status){
                    $('.response').html( data );
                }); 
            });


        </script>







<?php
    }
?>






</html>