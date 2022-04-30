<?php 
namespace App\Controllers;

use CodeIgniter\Controller; 
use App\Models\TransaksiModel;  
use App\Models\HargaModel;  
use App\Models\IdentitasModel;  
use App\Models\HistoriModel;    

class Transaksi extends Controller{

    public function index()
    {  
        if((session()->get('level') == 1)||(session()->get('level') == 2))
        {
            $Identitas = new IdentitasModel();
            $id_user    = session()->get('ID');

            $dataidentitas = $Identitas->where([
                                        'id_users' => $id_user,
                                    ])->first();
        
            $data = array(
                'menu' => '1d',
                'title' => 'Transaksi [SI-Futsal]', 
                'dtlv' => session()->get('level'),
                'unm' => session()->get('username'),
                'dataidentitas' => $dataidentitas,
            );
            echo view('extent/header', $data);
            echo view('v_transaksi', $data);
            echo view('extent/footer', $data); 
        }
    }

    public function trsk_check_prosess()
    {
        if((session()->get('level') == 1)||(session()->get('level') == 2))
        {

            echo '<div class="check-spc"> ';
            echo '<div>Keterangan :</div>';

            $Transaksi = new TransaksiModel();
            $Harga = new HargaModel();
            $Histori = new HistoriModel();
            $Identitas = new IdentitasModel();


            $id_user    = session()->get('ID');
            $tgl_book   = $this->request->getVar('tgl_book');
                $tgl_book = $tgl_book; 
                $pecah_tgl_book = explode('/', $tgl_book);
                $tahunedit      = explode(' ', $pecah_tgl_book[2]);
                $tgl_book_new   = $tahunedit[0].'-'.$pecah_tgl_book[1].'-'.$pecah_tgl_book[0]; 
            $lpng_book  = $this->request->getVar('lpng_book'); 
            $wm_book    = $this->request->getVar('wm_book');
                $pecah_wm_book = explode('-', $wm_book); 
                $pecah_wm_book2 = explode(':', $pecah_wm_book[0]);    
            $wb_book    = $this->request->getVar('wb_book');

           $akses= 0;
           $akses2 =0;
           $akses3 =0;


            $dataidentitas = $Identitas->where([
                                        'id_users' => $id_user,
                                    ])->first(); 
            $dataHistori = $Histori->where([ 
                                        'id_identitas' => $dataidentitas->id_identitas,
                                        'tgl_booking_lapangan' => $tgl_book_new,
                                        'booking_status' => 1,  
                                    ])->first();
             
          
                
          
            echo '<ul>';
            if (!$dataHistori) { 
                switch ($lpng_book) {
                    case "0":
                        echo "<li>Maaf, Anda Belum memilih Lapangan.</li>"; 
                        break; 
                    default:
                        $akses = 1;
                }

                switch ($wm_book) {
                    case "0":
                        echo "<li>Maaf, Anda Belum memilih Waktu Mulai.</li>"; 
                        break; 
                    default:
                        $akses2 = 1;
                }

                switch ($wb_book) {
                    case "0":
                        echo "<li>Maaf, Anda Belum memilih Waktu Lama Bermain.</li>"; 
                        break; 
                    default:
                        $akses3 = 1;
                }
               
            }else{
                if (session()->get('level') == 2){
                    echo "<li>Maaf, Silahkan Selesaikan Booking Anda sebelumnya di- <a href='".base_url()."/transaksi_pembayaran'>TRANSAKSI PEMBAYARAN</a>.</li>"; 
                }elseif (session()->get('level') == 1){
                    echo "<li>Maaf, Silahkan Selesaikan Booking Anda sebelumnya di- <a href='".base_url()."/history'>Histori</a>.</li>"; 
                }
            }
            echo '</ul>';   

            $aksesdibolehkan = $akses+$akses2+$akses3 ; 
            if ($aksesdibolehkan == 3) {
                
                for ($i=0; $i < $wb_book; $i++) { 
                    $total_jam = $pecah_wm_book2[0]+$i;
                    $jam_view = $total_jam.':00';
                    
                    $checkjadwal = $Transaksi->where3($tgl_book_new, $lpng_book, $jam_view );
                    if ($total_jam > 23) {
                        if ($total_jam < 25) {
                            $data_check[] =  $jam_view .'-3';   
                        }
                    }else{                 
                        foreach ($checkjadwal as $value) {   
                            if ($value->booking_status != 9) {
                                $data_check[] =  $value->booking_start.'-1';  
                            }
                            
                        } 
                    }
                
                }

                    if (isset($data_check)) {
                        echo '<ul>';
                        foreach ($data_check as $key => $v_data_check) {
                            $pecah_v_data_check = explode('-', $v_data_check); 
                                if ($pecah_v_data_check[1] == 1) {
                                    echo '<li>Maaf, untuk Jam <b>'.$pecah_v_data_check[0] .'</b> Sudah di-Booking dapat di lihat di <a href="'.base_url().'/jadwal"><b>Jadwal</b></a>.</li>'; 
                                }elseif ($pecah_v_data_check[1] == 3) {  
                                    echo '<li>Maaf, Untuk Jam <b>'. $pecah_v_data_check[0] .'</b> dan diatasnya Kami sudah Tutup akan Buka kembali Jam <b>08:00</b>.</li>';
                                }  
                        } 
                        echo '</ul>';
                    } else{
                        
                        echo '<ul>';
                        echo 'Tersedia : ';
                        $total = 0;
                        for ($i=0; $i < $wb_book; $i++) {  
                                $total_jam = $pecah_wm_book2[0]+$i;
                                $jam_view = $total_jam.':00'; 
                                echo '<li>Jam : <b>'.$jam_view.'</b></li>';   
                                if ($total_jam < '19') {
                                    $cuaca = '1';
                                }else{
                                    $cuaca = '2';
                                } 
                                $dataharga = $Harga->where([
                                                'booking_time' =>  $cuaca,
                                            ])->first(); 
                                echo ' Dengan Harga : <b>Rp ' . number_format($dataharga->harga,2,',','.').'/Jam </b>'; 
                                $total += $dataharga->harga;
                        } 
                        echo '<br><hr>';
                        echo 'Total : <b>Rp ' . number_format($total,2,',','.').'/Jam </b>';
                        echo '</ul>';
                        echo '<br><div style="text-align:center">Apakah Anda Ingin Booking Jam ini ?</div>';
                        echo '<form id="form1">
                                <input type="hidden" value="'.$total.'-'. $dataidentitas->id_identitas.'-'.$lpng_book.'-'.$tgl_book.'-'.$pecah_wm_book[0].'-'.$wb_book.'" id="total" readonly> 
                            ';
                        echo '<div class="row">';
                            echo '<div class="col-md-6" >';  
                                echo '<button id="kirimdonk" type="submit" class="btn btn-block btn-success">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                            &nbsp; Booking  
                                    </button>'; 
                            echo '</div>';
                            echo '<div class="col-md-6" >';
                                echo '<a href="'.base_url().'/transaksi" type="submit" class="btn btn-block btn-danger">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            &nbsp; Cancel  
                                    </a>'; 
                            echo '</div>';
                        echo '</div>'; 
                        echo '</form>';
                    } 
                echo '</div>';
                    
                


                ?>
                <script>
                $("#kirimdonk").click(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST", 
                        url: "<?=base_url()?>/transaksi/p",  
                        enctype: 'multipart/form-data', 
                        data: {
                                total: $("#total").val(),
                        },
                        cache: false,  
                        success: function(data) {
                            //alert(data);
                            <?php
                            if (session()->get('level') == 2) {
                            ?>
                                window.location.href = "<?=base_url()?>/transaksi_pembayaran"; 
                            <?php
                            }elseif (session()->get('level') == 1) {
                            ?>
                                window.location.href = "<?=base_url()?>/history"; 
                            <?php 
                            }
                            ?> 
                            //location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                        }
                    });
                }); 
                </script>
                <?php 


            } //end perbolehkan akses
 

        } 
    }
 
    public function trsk_p_prosess()
    { 
        if((session()->get('level') == 1)||(session()->get('level') == 2))
        {
            $Transaksi = new TransaksiModel(); 
            $Harga = new HargaModel();    
            $Histori = new HistoriModel(); 

            $total = $this->request->getVar('total');
            $pecah =  explode('-', $total);
            $kodetransaksi = 'FUT'.date("mHYdis");
            $total_harga = $pecah[0];
            $id_user = $pecah[1];
            $lpng_book = $pecah[2];
            $tgl_book = $pecah[3]; 
                $pecah_tgl_book = explode('/', $tgl_book);
                $tahunedit      = explode(' ', $pecah_tgl_book[2]);
                $tgl_book_new   = $tahunedit[0].'-'.$pecah_tgl_book[1].'-'.$pecah_tgl_book[0]; 
            $wm_book =  $pecah[4];
            $wb_book =  $pecah[5];

            $Histori->insert([ 
                        'kode_transaksi' => $kodetransaksi,
                        'id_identitas' => $id_user,
                        'tgl_booking_lapangan' => $tgl_book_new,
                        'booking_lapangan' => $lpng_book,
                        'booking_start' => $wm_book,
                        'booking_play' => $wb_book,
                        'total_harga' => $total_harga,
                        'booking_bukti' => 0,
                        'booking_status' => 1,
                        'booking_TOKEN' => 0,
                        'kode_unix' => rand(100,999), 
                        'tgl_pbt_histori' => date("Y-m-d H-i-s"),
            ]);

                 
            for ($i=0; $i < $wb_book ; $i++) { 
                $pecah_wm_book = explode(':', $wm_book);
                $jml_wm_book = $pecah_wm_book[0]+$i;
                
               

                if ($jml_wm_book < '19') {
                    $cuaca = '1';
                }else{
                    $cuaca = '2';
                } 
                $dataharga = $Harga->where([
                                'booking_time' =>  $cuaca,
                            ])->first(); 
                 

                $Transaksi->insert([ 
                        'kode_transaksi' => $kodetransaksi,
                        'id_identitas' => $id_user,
                        'tgl_booking_lapangan' => $tgl_book_new,
                        'booking_lapangan' => $lpng_book,
                        'booking_start' => $jml_wm_book.":00",
                        'booking_play' => 1,
                        'total_harga' => $dataharga->harga,
                        'booking_status' => 1,
                        'tgl_pbt_transaksi' => date("Y-m-d H-i-s"),
                    ]);
            }
        }else{
            return redirect()->to(base_url('/'))->withInput();  
        }  
    }

   
    public function trs_booking($getdata = null)
    {
        if(session()->get('level') == 2)
        {
            
            $Histori = new HistoriModel();

            if (isset($getdata)) {
                $pecahtgl = explode("-",$getdata);
                $tgl = $pecahtgl[2].'-'.$pecahtgl[1].'-'.$pecahtgl[0];  
            }else{
                $tgl = date("Y-m-d");  
            }

            $dataHistori = $Histori->where([  
                                        'tgl_booking_lapangan' => $tgl, 
                                    ])->findAll();


            $data = array(
                'menu' => '1d',
                'title' => 'Transaksi [SI-Futsal]', 
                'dtlv' => session()->get('level'),
                'unm' => session()->get('username'), 
                'dataHistori' => $dataHistori,  
                'sendtgl' => $tgl, 
            );
            echo view('extent/lv2/header', $data);
            echo view('v_transaksi_booking_lv2', $data);
            echo view('extent/lv2/footer', $data); 





        }else{
            return redirect()->to(base_url('/'))->withInput();  
        } 
    }




    public function trs_pembayaran($getdata = null)
    {
        if(session()->get('level') == 2)
        {
            if (isset($getdata)) {
                $pecahtgl = explode("-",$getdata);
                $tgl = $pecahtgl[2].'-'.$pecahtgl[1].'-'.$pecahtgl[0];  
            }else{
                $tgl = date("Y-m-d");  
            }

            $Histori = new HistoriModel();
            $Transaksi = new TransaksiModel();

            $dataHistori = $Histori->join_where($tgl);
            $dataHistori2 = $Histori->findAll();

            foreach ($dataHistori2 as $vs_dataHistori) {
                 if ($vs_dataHistori->tgl_booking_lapangan < date("Y-m-d")) {
                     if ($vs_dataHistori->booking_status == 2) {
                        $Histori->update($vs_dataHistori->id_histori , ['booking_status' => 3]);
                        
                        $dataTransaksi = $Transaksi->where([  
                                                            'kode_transaksi' => $vs_dataHistori->kode_transaksi, 
                                                            'id_identitas' => $vs_dataHistori->id_identitas, 
                                                        ])->findAll();
                        foreach ($dataTransaksi as $vs_dataTransaksi) {
                            $Transaksi->update($vs_dataTransaksi->id_transaksi, ['booking_status' => 3]);
                        }
                     }elseif ($vs_dataHistori->booking_status == 1) {
                        $Histori->update($vs_dataHistori->id_histori , ['booking_status' => 9]);
                        $dataTransaksi = $Transaksi->where([  
                                                            'kode_transaksi' => $vs_dataHistori->kode_transaksi, 
                                                            'id_identitas' => $vs_dataHistori->id_identitas, 
                                                        ])->findAll();
                        foreach ($dataTransaksi as $vs_dataTransaksi) {
                            $Transaksi->update($vs_dataTransaksi->id_transaksi, ['booking_status' => 9]);
                        } 
                     }
                 } 
            }




            $data = array(
                'menu' => '1e',
                'title' => 'Transaksi [SI-Futsal]', 
                'dtlv' => session()->get('level'),
                'unm' => session()->get('username'), 
                'dataHistori' => $dataHistori,  
                'sendtgl' => $tgl, 
            );
            echo view('extent/lv2/header', $data);
            echo view('v_transaksi_pembayaran_lv2', $data);
            echo view('extent/lv2/footer', $data); 

 
            
        }else{
            return redirect()->to(base_url('/'))->withInput();  
        } 
    }



    public function ajax_trs_pembayaran()
    {
        if(session()->get('level') == 2)
        { 
                if (!$this->validate([
                    'buktimanual' => [
                        'rules' =>    'is_image[buktimanual]'
                                    .'|mime_in[buktimanual,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                                    .'|max_size[buktimanual,1000]',  
                        'errors' => [    
                            'is_image' => 'File harus berformat Gambar.',
                            'mime_in' => 'File yang di izinkan image/jpg, image/jpeg,image/gif,image/png, image/webp.',   
                            'max_size' => 'Ukuran File Paling besar 1Mb.',   
                        ]
                    ],  
                ])) { 
                    session()->setFlashdata('pesantrs_pembayaran', $this->validator->listErrors());
                    return redirect()->to(base_url('/transaksi_pembayaran'))->withInput(); 
                } 

            $Histori = new HistoriModel();
            $Transaksi = new TransaksiModel();

            $id_histori = $this->request->getVar('_access_val');  
            $dataHistori = $Histori->where([
                                    'id_histori' => $id_histori,  
                                ])->findAll();

            $dataTransaksi = $Transaksi->where([
                                    'kode_transaksi' => $dataHistori[0]->kode_transaksi, 
                                    'id_identitas' => $dataHistori[0]->id_identitas, 
                                ])->findAll();            
          
            if ($img = $this->request->getFile('buktimanual')) { 
                if ($img->isValid() && ! $img->hasMoved())
                {
                    $newName = $img->getRandomName();
                    $img->move('uploads/bukti/', $newName);           
                }  else{
                    session()->setFlashdata('pesantrs_pembayaran', '<ul><li>File Gambar Tidak terdeteksi</li></ul>');
                    return redirect()->to(base_url('/transaksi_pembayaran'))->withInput(); 
                }
            }
            

            $data = [
                'booking_bukti' => $newName,  //status cancel 
                'booking_status' => 4,  //status waitting setelah upload bukti  
            ]; 
            $Histori->update($id_histori , $data);  
        
            foreach ($dataTransaksi as $valueX) {   
                $data2 = [ 
                    'booking_status' => 4,  //status waitting setelah upload bukti 
                ];  
                $Transaksi->update($valueX->id_transaksi, $data2);
            }
            
             
            return redirect()->to(base_url('/transaksi_pembayaran'))->withInput(); 



        }
    }


    public function ajax_trs_pembayaran_dua()
    {
        if(session()->get('level') == 2)
        { 
                if (!$this->validate([
                    'buktimanual' => [
                        'rules' =>    'is_image[buktimanual]'
                                    .'|mime_in[buktimanual,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                                    .'|max_size[buktimanual,1000]',  
                        'errors' => [    
                            'is_image' => 'File harus berformat Gambar.',
                            'mime_in' => 'File yang di izinkan image/jpg, image/jpeg,image/gif,image/png, image/webp.',   
                            'max_size' => 'Ukuran File Paling besar 1Mb.',   
                        ]
                    ],  
                ])) { 
                    session()->setFlashdata('pesantrs_pembayaran', $this->validator->listErrors());
                    return redirect()->to(base_url('/transaksi_pembayaran'))->withInput(); 
                } 

            $Histori = new HistoriModel();
            $Transaksi = new TransaksiModel();

            $id_histori = $this->request->getVar('_access_val');  
            $dataHistori = $Histori->where([
                                    'id_histori' => $id_histori,  
                                ])->findAll();

            $dataTransaksi = $Transaksi->where([
                                    'kode_transaksi' => $dataHistori[0]->kode_transaksi, 
                                    'id_identitas' => $dataHistori[0]->id_identitas, 
                                ])->findAll();            
          
            if ($img = $this->request->getFile('buktimanual')) { 
                if ($img->isValid() && ! $img->hasMoved())
                {
                    $newName = "bukti_edit-".rand(1111,999999);
                    $img->move('uploads/bukti/', $newName);           
                }  else{
                    session()->setFlashdata('pesantrs_pembayaran', '<ul><li>File Gambar Tidak terdeteksi</li></ul>');
                    return redirect()->to(base_url('/transaksi_pembayaran'))->withInput(); 
                }
            }
            

            $data = [
                'booking_bukti_update' => $newName,   
                'booking_status' => 4,   
                'booking_TOKEN' => rand(111111,999999),   
            ]; 
            $Histori->update($id_histori , $data);  
        
            foreach ($dataTransaksi as $valueX) {   
                $data2 = [ 
                    'booking_status' => 4,   
                ];  
                $Transaksi->update($valueX->id_transaksi, $data2);
            }
            
             
            return redirect()->to(base_url('/transaksi_pembayaran'))->withInput(); 



        }
    }






    public function ajax_trs_clc_pembayaran()
    {
        if(session()->get('level') == 2)
        {

            $Histori = new HistoriModel();
            $Transaksi = new TransaksiModel();

            $id_histori = $this->request->getVar('_access_val');  


            $dataHistori = $Histori->where([
                                    'id_histori' => $id_histori,  
                                ])->findAll();

            $dataTransaksi = $Transaksi->where([
                                    'kode_transaksi' => $dataHistori[0]->kode_transaksi, 
                                    'id_identitas' => $dataHistori[0]->id_identitas, 
                                ])->findAll();     

            /*  */
            $Histori->update($id_histori , [ 'booking_status' => 9 ]);  
            foreach ($dataTransaksi as $valueX) {    
                $Transaksi->update($valueX->id_transaksi, [ 'booking_status' => 9 ]);  
            }
 
            return redirect()->to(base_url('/transaksi_pembayaran'))->withInput();  

        }
    }


    public function ajax_apv_pembayaran()
    {
        if(session()->get('level') == 2)
        {

            $Histori = new HistoriModel();
            $Transaksi = new TransaksiModel();

            $id_histori = $this->request->getVar('_access_val');  


            $dataHistori = $Histori->where([
                                    'id_histori' => $id_histori,  
                                ])->findAll();

            $dataTransaksi = $Transaksi->where([
                                    'kode_transaksi' => $dataHistori[0]->kode_transaksi, 
                                    'id_identitas' => $dataHistori[0]->id_identitas, 
                                ])->findAll();     

            /*  */
            $Histori->update($id_histori , [ 'booking_status' => 3 ]);  
            foreach ($dataTransaksi as $valueX) {    
                $Transaksi->update($valueX->id_transaksi, [ 'booking_status' => 3 ]);  
            }
 
            return redirect()->to(base_url('/transaksi_pembayaran'))->withInput();  
 

        }
    }




    public function ajax_tkn_pembayaran()
    {
        if(session()->get('level') == 2)
        {

            $Histori = new HistoriModel();
            $Transaksi = new TransaksiModel();

             $id_histori = $this->request->getVar('_access_val');  
             $Token = $this->request->getVar('_tkn_val');  


            $dataHistori = $Histori->where([
                                    'id_histori' => $id_histori,  
                                ])->findAll();

            $dataTransaksi = $Transaksi->where([
                                    'kode_transaksi' => $dataHistori[0]->kode_transaksi, 
                                    'id_identitas' => $dataHistori[0]->id_identitas, 
                                ])->findAll();     
 
            if ($dataHistori[0]->booking_TOKEN == $Token) {
                if ($Token == 0) {   
                    session()->setFlashdata('pesantrs_pembayaran', '<ul><li>Token yang di berikan Salah, <br>Silahkan Coba lagi.</li></ul>');
                    return redirect()->to(base_url('/transaksi_pembayaran'))->withInput(); 
                }else{ 
                    $Histori->update($id_histori , [ 'booking_status' => 4 ]);  
                    foreach ($dataTransaksi as $valueX) {    
                        $Transaksi->update($valueX->id_transaksi, [ 'booking_status' => 4 ]);   
                    }
                    return redirect()->to(base_url('/transaksi_pembayaran'))->withInput(); 
                }
            }else{
                    session()->setFlashdata('pesantrs_pembayaran', '<ul><li>Token yang di berikan Salah, <br>Silahkan Coba lagi.</li></ul>');
                    return redirect()->to(base_url('/transaksi_pembayaran'))->withInput(); 
            }  



       
        }
    }












}