             
              




            </div>  
             <footer class="footer" style ="margin: -40px 0 0 0;"> 
                    <div class="card">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="<?=base_url()?>">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                                    &nbsp;&nbsp;Home
                                </a>
                            </li> 
                            <li>
                                <a href="<?=base_url()?>/login">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                    &nbsp;&nbsp;Jadwal
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>/login">
                                    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                    &nbsp;&nbsp;Transaksi
                                </a>
                            </li>    
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="/">Si-Futsal</a>
                    </p> 
                </div>
            </footer>


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




    <?php
    if ($menu == '1b') { 
    ?>
    
        <script src="<?=base_url()?>/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
        <script src="<?=base_url()?>/assets/js/chartist.min.js"></script> 
        <script src="<?=base_url()?>/assets/js/jquery-jvectormap.js"></script> 
        <script src="<?=base_url()?>/assets/js/material-dashboard.js"></script>


        <script type="text/javascript"> 

            $(window).on("load",function(){
                $(".loader-wrapper").fadeOut(2000);
            });


            $().ready(function() {
                $page = $('.page-view');
                image_src = $page.data('image');

                if(image_src !== undefined){
                    image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
                    $page.append(image_container);
                }
            });

        </script>
 

    <?php
    }elseif ($menu == '1c') { 
    ?>



        <script src="<?=base_url()?>/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script> 
        <script src="<?=base_url()?>/assets/js/material-dashboard.js"></script>
        
        <!--  DataTables.net Plugin    -->
        <script src="<?=base_url()?>/assets/js/jquery.datatables.js"></script>
        <script src='<?=base_url()?>/datatables/Buttons-2.2.2/js/dataTables.buttons.js' type='text/javascript'></script>


        <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
        <script src="<?=base_url()?>/assets/js/moment.min.js"></script>
        <!-- DateTimePicker Plugin -->
        <script src="<?=base_url()?>/assets/js/bootstrap-datetimepicker.js"></script>
        <!--  Full Calendar Plugin    -->
        <script src="<?=base_url()?>/assets/js/fullcalendar.min.js"></script>

        <script type="text/javascript">

            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';
            $(document).ready(function() {   

            

                var table =  $('#daftar_jdwl').DataTable({
                    dom: 'Bfrtip',
                            buttons: [
                                {
                                    text: 'Lapangan 1',
                                    className: 'btn btn-primary',
                                    action: function ( e, dt, node, config ) {
                                        $(node).removeClass('dt-button')
                                        alert( config );
                                    }
                                }, 
                                {
                                    text: 'Lapangan 2',
                                    className: 'btn btn-danger',
                                    action: function ( e, dt, node, config ) {
                                        $(node).removeClass('dt-button')
                                        alert( config );
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

                    $('.datepicker').datetimepicker({
                        format: 'MM/DD/YYYY ',
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
                            inline: true
                        }
                    });

                    $('.timepicker').datetimepicker({
                    //          format: 'H:mm',    // use this format if you want the 24hours timepicker
                        format: 'h:mm A',    //use this format if you want the 12hours timpiecker with AM/PM toggle
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
                            inline: true

                        }
                    }); 

            
            
            
            
            
            
            
            
            
            } );
        </script>


    <?php
    }elseif ($menu == '1d') { 
    ?> 
        <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
        <script src="<?=base_url()?>/assets/js/moment.min.js"></script>
        <!-- DateTimePicker Plugin -->
        <script src="<?=base_url()?>/assets/js/bootstrap-datetimepicker.js"></script>
        <!--  Full Calendar Plugin    -->
        <script src="<?=base_url()?>/assets/js/fullcalendar.min.js"></script>
        <!-- Select Plugin -->
        <script src="<?=base_url()?>/select2-4.0.13/dist/js/select2.min.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="<?=base_url()?>/assets/js/jquery.validate.min.js"></script>
        <script src="<?=base_url()?>/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script> 
        <script src="<?=base_url()?>/assets/js/material-dashboard.js"></script>
      
        <script>
           
            $(document).ready(function() {    
                $('.select-drop-input').select2({  
                        
                });  

                $('.datepicker').datetimepicker({
                    format: 'DD/MM/YYYY ',
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
                        inline: true
                    }
                }); 

                $( ".close" ).click(function() {
                    /* $( this ).hide(); */
                    $(".alert-pass" ).hide(); 
                 });
 
                 
            });

                 
            function processForm( e ){
                $.ajax({
                    type: "POST", 
                    url: "<?=base_url()?>/transaksi/check",  
                    enctype: 'multipart/form-data', 
                    data: {
                        tgl_book: $("#tgl_book").val(), 
                        lpng_book: $("#lpng_book").val(),
                        wm_book: $("#wm_book").val(),
                        wb_book: $("#wb_book").val(), 
                    }, 
                    cache: false, 
                    success: function(data) {
                        $('#response').html( data );
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr);
                    }
                });

                e.preventDefault();
            }

            $('#form-transaksi').submit( processForm ); 
          
            
        </script>
    
    <?php
    } 
    ?>


</html>