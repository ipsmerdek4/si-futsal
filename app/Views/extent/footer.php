             
              




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
                            <?php
                                if ($dtlv == 1) {
                            ?>
                            
                            <li>
                                <a href="<?=base_url()?>/jadwal">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                    &nbsp;&nbsp;Jadwal
                                </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>/transaksi">
                                    <span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                    &nbsp;&nbsp;Transaksi
                                </a>
                            </li> 
                            
                            <?php
                                }
                            ?>   
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

            window.setTimeout("waktu()", 1000);

            function waktu() {
                var waktu = new Date();
                setTimeout("waktu()", 1000); 
                document.getElementById("jam").innerHTML =  ('0' + waktu.getHours()).slice(-2)   + ':' + ('0' + waktu.getMinutes()).slice(-2) + ':' + ('0' + waktu.getSeconds()).slice(-2) + ' WITA'; 
            }


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

        <!-- Select Plugin -->
        <script src="<?=base_url()?>/select2-4.0.13/dist/js/select2.min.js"></script>

        <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
        <script src="<?=base_url()?>/assets/js/moment.min.js"></script>
        <!-- DateTimePicker Plugin -->
        <script src="<?=base_url()?>/assets/js/bootstrap-datetimepicker.js"></script>
        <!--  Full Calendar Plugin    -->
        <script src="<?=base_url()?>/assets/js/fullcalendar.min.js"></script>

        <script type="text/javascript">

            $("#jadwaltagl").click(function(){ 
                 window.location.href = '<?=base_url()?>/jadwal/'+ $("#jadwaltaglval").val() + '*' + $("#lapnganval").val(); 
            }); 

            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';
            $(document).ready(function() {   
                 
                $('.select-drop-input').select2({
                    minimumResultsForSearch: -1
                });

                var table =  $('#daftar_jdwl').DataTable({
                    dom: 'Bfrtip',
                            /* buttons: [
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
                            ], */
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
    }elseif ($menu == '1e') { 
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

        <!--  DataTables.net Plugin    -->
        <script src="<?=base_url()?>/assets/js/jquery.datatables.js"></script>
        <script src='<?=base_url()?>/datatables/Buttons-2.2.2/js/dataTables.buttons.js' type='text/javascript'></script>

     
        <script src="<?=base_url()?>/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script> 
        <script src="<?=base_url()?>/assets/js/material-dashboard.js"></script>


        <script>
            $(document).on("click", ".btn-konfirmasi", function () {
                var access_val = $(this).data('id');
                
                $(".text-modal-spc ._file").html( access_val );  
            });


            const rupiah = (number)=>{
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(number);
            }
                /*  */
            $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn';
            $(document).ready(function() {    
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

                /*  */ 
                var table =  $('#daftar_history').DataTable({
                    dom: 'Bfrtip',  
                    footerCallback : function ( row, data, start, end, display ) {
                        var api = this.api(), data;
            
                        // converting to interger to find total
                        var intVal = function ( i ) {
                            return typeof i === 'string' ?
                                i.replace(/[\$,]/g, '')*1 :
                                typeof i === 'number' ?
                                    i : 0;
                        };
            
                        // computing column Total of the complete result 
                        var totaltransaksi = api
                            .column( 4 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );
                           
                      
                            
                            if ($(window).width() >= 1000 ) { 
                                $( api.column( 3 ).footer() ).html('Total');
                                $( api.column( 4 ).footer() ).html(rupiah(totaltransaksi)); 
                            }else if($(window).width() >= 285 ){
                                $( api.column( 0 ).footer() ).html("Total"); 
                                $( api.column( 1 ).footer() ).html(rupiah(totaltransaksi)); 
                            }else{    
                                $( api.column( 0 ).footer() ).html("Total : <br> " + rupiah(totaltransaksi)); 
                            }

                    },
 
                    buttons: [
                        <?php 
                         ?> 
                        {
                            text: '<b>Konfirmasi<br>Pembayaran</b>',
                            className: 'btn btn-primary',
                            action: function ( e, dt, node, config ) { 
                               $('#his_modal').modal('show'); 
                                /* $(node).removeClass('dt-button')
                                alert( config ); */
                            }
                        }, 
                        <?php 
                          ?>
                        {
                            text: '<b>Histori <br> Transaksi</b>',
                            className: 'btn btn-danger',
                            action: function ( e, dt, node, config ) {
                                window.location.href = '/history/viewall';
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
                                          targets: 4,
                                          className: ' text-sm-center',
                                          render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp ' ),
                                      },
                    ],

                });
                table.on( 'order.dt search.dt', function () {
                        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        } );
                } ).draw();

                /*  */
                var tablen2 =  $('#all_history').DataTable({
                    dom: 'Bfrtip',  
                    buttons: [                      
                        {
                            text: '<i class="material-icons">arrow_back</i> <b>Kembali</b>',
                            className: 'btn btn-danger',
                            action: function ( e, dt, node, config ) {
                                window.location.href = '/history';
                                //$(node).removeClass('dt-button')
                               // alert( config );
                            }
                        }
                    ],
                    responsive: true, 
                    lengthChange: false, 
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

                

            <?php if(session()->has("alert")) { ?> 
               $('#alert_modal').modal('show')  
            <?php } ?> 


            });

              /*  */

            $(document).on("click", ".open-historicancel", function () {
                var myhistoricancel = $(this).data('id');
                $("#myhistoricancel").val( myhistoricancel ); 
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
    }elseif ($menu == '1z') { 
    ?> 
       
        <!-- Select Plugin -->
        <script src="<?=base_url()?>/select2-4.0.13/dist/js/select2.min.js"></script>

        <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="<?=base_url()?>/assets/js/jasny-bootstrap.min.js"></script>

        <!-- phone -->
        <script src="<?=base_url()?>/intl-tel-input-master/build/js/intlTelInput.js"></script>
        <script src="<?=base_url()?>/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>
        

        <script src="<?=base_url()?>/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script> 
        <script src="<?=base_url()?>/assets/js/material-dashboard.js"></script>

        <script>
            
            
            $.fn.modal.Constructor.prototype.enforceFocus = function() {};

            $(document).ready(function() {    
                <?php 
                if(session()->getFlashData('pesan_profil')){
                ?> 
                    $('#alert_modalX').modal('show');   
                <?php
                }
                ?>
                /*  */ 
                $('.select-drop-input').select2({
                    //dropdownParent: $('#add_pelanggan')
                });  
                /*  */
                $("#opn-pass").hide(); 
                $("#showpass").click(function() {
                    if ($(this).is(":checked")){
                        $("#opn-pass").show();
                    }else{
                        $("#opn-pass").hide();
                    }
                });
                /*  */ 
                
             });

            
            //load alamat
            /* $("#provinsi").change(function (){
                var url = "<?php echo site_url('profil/add_ajax_kb');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            })

            $("#kabupaten").change(function (){
                var url = "<?php echo site_url('profil/add_ajax_kc');?>/"+$(this).val();
                $('#kecamatan').load(url);
                return false;
            })

            $("#kecamatan").change(function (){
                var url = "<?php echo site_url('profil/add_ajax_de');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            }) */


               $(document).on("click", ".btn-profil", function () {  
                    var access_val = $(this).data('id');    
                    var data = { access_val : access_val, };  
                    $.getJSON("<?=base_url()?>/profil/v", data, function (result) {   
                        $.each(result.tampil, function() {
                            $(".title-spc-p").html("Edit Profil");   
                            $("#_actprofil").attr('action', '<?=base_url()?>/profil/e');  
                            
                            $("#firstname").val( this['firstname'] );  
                            $("#lastname").val( this['lastname'] );   
                            $("#tim").val( this['tim'] );  
                            $("#tim").val( this['tim'] ); 
                            $("#phone111").val( this['hp'] ); 
                            $("#email").val( this['email'] );  
                            $("#phone111").val( this['hp'] );   
                            $("#alamat").val( this['alamat'] ); 
                            $("#provinsi").val( this['provinsi_name'] ); 
                            $("#kabupaten").val( this['kabupaten_name'] ); 
                            $("#kecamatan").val( this['kecamatan_name'] ); 
                            $("#desa").val( this['desa_name'] ); 
                            $("#username").val( this['username_users'] );        

                            $(".ex-user").html(''+
                                '<input type="hidden" value = "'+ this['id_users'] +'" name="profil" >'+
                            ''); 


                        });  
                        return false;
                    }); 
                }); 


              /* format telp */
                var inputtlp = document.querySelector("#phone111");
                window.intlTelInput(inputtlp, { 
                    initialCountry: "id",
                    separateDialCode: true,
                    preferredCountries: ["id",], 
                    allowDropdown:false,
                    utilsScript: "<?=base_url()?>/intl-tel-input-master/build/js/utils.js",

                });
                $( '#phone111' ).mask('99-999-999-999');

                
                
            /* END format telp  */

        </script>


    <?php
    } 
    ?>


</html>