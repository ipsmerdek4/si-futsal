<?php 
namespace App\Controllers;

use CodeIgniter\Controller; 
use App\Models\TransaksiModel;  
use App\Models\HargaModel;  
use App\Models\IdentitasModel;  

class Transaksi extends Controller{

    public function index()
    { 
 
        if(session()->get('level') == 1)
        {
            $Identitas = new IdentitasModel();
            $id_user    = session()->get('ID');

            $dataidentitas = $Identitas->where([
                                        'id_user' => $id_user,
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
        if(session()->get('level') == 1)
        {

            echo '<div class="check-spc"> ';
            echo '<div>Keterangan :</div>';

            $Transaksi = new TransaksiModel();
            $Harga = new HargaModel();


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

           echo '<ul>'; 

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
                        $data_check[] =  $value->booking_start.'-1';  
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
                            <input type="hidden" value="'.$total.'-'. $id_user.'-'.$lpng_book.'-'.$tgl_book.'-'.$pecah_wm_book[0].'-'.$wb_book.'" id="total" readonly> 
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
                        window.location.href = "<?=base_url()?>/history";
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
            
            $total = $this->request->getVar('total');
            $pecah =  explode('-', $total);
            
            $total_harga = $pecah[0];
            $id_user = $pecah[1];
            $lpng_book = $pecah[2];
            $tgl_book = $pecah[3]; 
                $pecah_tgl_book = explode('/', $tgl_book);
                $tahunedit      = explode(' ', $pecah_tgl_book[2]);
                $tgl_book_new   = $tahunedit[0].'-'.$pecah_tgl_book[1].'-'.$pecah_tgl_book[0]; 
            $wm_book =  $pecah[4];
            $wb_book =  $pecah[5];


            for ($i=0; $i < $wb_book ; $i++) { 
                $pecah_wm_book = explode(':', $wm_book);
                $jml_wm_book = $pecah_wm_book[0]+$i;
                
                $Transaksi = new TransaksiModel(); 
                $Transaksi->insert([ 
                        'id_identitas' => $id_user,
                        'tgl_booking_lapangan' => $tgl_book_new,
                        'booking_lapangan' => $lpng_book,
                        'booking_start' => $jml_wm_book.":00",
                        'booking_play' => 1,
                        'total_harga' => $total_harga,
                        'booking_status' => 1,
                        'tgl_pbt_transaksi' => date("Y-m-d H-i-s"),
                    ]);
            }



            
 
             
/* 



            $PersediaanKayus = new PersediaanKayuModel(); 
 
            $PersediaanKayus->insert([ 
                'Tanggal_persediaan' => $this->request->getVar('tgl'),
                'jml_persediaan' => $this->request->getVar('p_kayu'),
                'sisa_persediaan' => $this->request->getVar('p_kayu'),
                'id_harga_kayu' => $this->request->getVar('harga_k'),
                'id_jenis_kayu' => $this->request->getVar('j_kayu'),
                'id_tipe_kayu' => $this->request->getVar('t_kayu'),
                'id_ukuran_kayu' => $this->request->getVar('ukayu'),
            ]);
 

            session()->setFlashdata('alert', 'Berhasil Menambah Data.');
            return redirect()->to(base_url('persediaan-kayu/'))->withInput(); 
                          */

    }

   



}