<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IdentitasModel;  
use App\Models\TransaksiModel;  
use App\Models\HistoriModel;   
use App\Models\HargaModel;  

class Jadwal extends Controller{


    public function index()
    { 
        if(session()->get('level') == 1)
        {
  
            $Transaksi  = new TransaksiModel();
            $Histori    = new HistoriModel(); 

             

            $tgl = date("Y-m-d");
            $lapangan = 1;

            $dataTransaksi = $Transaksi->join_where($tgl, $lapangan);



            $data = array(
                'menu' => '1c',
                'title' => 'Jadwal [SI-Futsal]', 
                'dtlv' => session()->get('level'),
                'unm' => session()->get('username'),
                'dataTransaksi' =>  $dataTransaksi, 

            );
            echo view('extent/header', $data);
            echo view('v_jadwal', $data);
            echo view('extent/footer', $data);

        }elseif (session()->get('level') == 2) { 
 
            $Transaksi  = new TransaksiModel();
            $Histori    = new HistoriModel(); 


            $tgl = date("Y-m-d");
            $lapangan = 1;

            $dataTransaksi = $Transaksi->join_where($tgl, $lapangan);
 

            $data = array(
                'menu'          => '1c',
                'title'         => 'Jadwal [SI-Futsal]', 
                'dtlv'          => session()->get('level'),
                'unm'           => session()->get('username'), 
                'dataTransaksi' =>  $dataTransaksi,  

            );


            echo view('extent/lv2/header', $data);
            echo view('v_jadwal_lv2', $data);
            echo view('extent/lv2/footer', $data);
 
        }


    }



    

    public function view_jadwal($data = null)
    { 
        if(session()->get('level') == 1)
        { 
            $Transaksi  = new TransaksiModel();
            $Histori    = new HistoriModel(); 

            if (isset($data)) {
                $pecahgetdata   = explode('*', $data); 
                $pecah_tgl_book = explode('-', $pecahgetdata[0]); 
                $tgl            = $pecah_tgl_book[2].'-'.$pecah_tgl_book[1].'-'.$pecah_tgl_book[0]; 
                $lapangan       = $pecahgetdata[1];
            }else{ 
                $tgl = date("Y-m-d");
                $lapangan = 1;
            }           
            

             

            $dataTransaksi = $Transaksi->join_where($tgl, $lapangan); 

            $data = array(
                'menu'          => '1c',
                'title'         => 'Jadwal [SI-Futsal]', 
                'dtlv'          => session()->get('level'),
                'unm'           => session()->get('username'),
                'dataTransaksi' => $dataTransaksi, 
                'lapangan'      => $lapangan,
                'tgl'           => $pecahgetdata[0],


            );
            echo view('extent/header', $data);
            echo view('v_jadwal', $data);
            echo view('extent/footer', $data);


                
        }elseif (session()->get('level') == 2) { 

            $Transaksi  = new TransaksiModel();
            $Histori    = new HistoriModel(); 

            if (isset($data)) {
                $pecahgetdata   = explode('*', $data); 
                $pecah_tgl_book = explode('-', $pecahgetdata[0]); 
                $tgl            = $pecah_tgl_book[2].'-'.$pecah_tgl_book[1].'-'.$pecah_tgl_book[0]; 
                $lapangan       = $pecahgetdata[1];
            }else{ 
                $tgl = date("Y-m-d");
                $lapangan = 1;
            }           
            

             

            $dataTransaksi = $Transaksi->join_where($tgl, $lapangan); 

            $data = array(
                'menu'          => '1c',
                'title'         => 'Jadwal [SI-Futsal]', 
                'dtlv'          => session()->get('level'),
                'unm'           => session()->get('username'),
                'dataTransaksi' => $dataTransaksi, 
                'lapangan'      => $lapangan,
                'tgl'           => $pecahgetdata[0],


            );
             echo view('extent/lv2/header', $data);
            echo view('v_jadwal_lv2', $data);
            echo view('extent/lv2/footer', $data);

        } 
    }



    

    public function post_opsi_jadwal()
    {
        if(session()->get('level') == 2)
        {
            $access_val = $this->request->getVar('access_val');
            $pecahkan_access_val = explode('*', $access_val);
            $id_transaksi = $pecahkan_access_val[0];
            if (isset($pecahkan_access_val[1])) {
                $codeakses = $pecahkan_access_val[1]; 
            }else{
                $codeakses = ''; 
                $title = '';
                $text = '';
                $ket = '';
                $lokasi = '';
            }
           
            $Transaksi  = new TransaksiModel(); 

            $dataTransaksi = $Transaksi->join_spc_jadwal($id_transaksi); 
 
            if ($codeakses == '1') {
                $title = "Cancel Booking";
                $text = "Proses ini akan menghapus data anda,<br>Apa Anda Yakin?";
                $ket = '
                        <ul>
                            <li>Nama Tim/Perwakilan : <b>'.$dataTransaksi[0]->tim.'/'.$dataTransaksi[0]->firstname.'</b></li>
                            <li>Lapangan : <b>'.$dataTransaksi[0]->booking_lapangan.'</b></li>
                            <li>Jam Booking : <b>'.$dataTransaksi[0]->booking_start.'</b></li>
                        </ul>
                ';
                $lokasi = base_url()."/jadwal/cancelboking";
            }elseif ($codeakses == '2') {
                $title = "Edit Booking";
                $text = "Proses ini akan merubah data anda,<br>Apa Anda Yakin?";
                $ket = ' <br>
                        <ul>
                            <li>
                                Nama Tim/Perwakilan : 
                                <input class="b-jdwl-edit" type="text" disabled value="'.$dataTransaksi[0]->tim.'/'.$dataTransaksi[0]->firstname.'">
                            </li>
                        </ul> 
                    '; 
                $lokasi = base_url()."/jadwal/editboking"; 
            }

            echo '<div class="modal-header">';
                echo '<h5 class="modal-title text-center title-spc-ajxpembayaran" >';
                    echo '<b>'.$title.'</b>';
                echo '</h5> ';
                echo '<hr style="margin:10px 0 0 0; border-top:1px solid red">';
            echo '</div>';
    
            echo '<form action="'.$lokasi.'" method="post" enctype="multipart/form-data">';
                echo '<div class="modal-body "> ';
                    echo '<div class="text-modal-spc">';
                        echo '<h5 style="font-size:14px;text-align:center;color:red"><b>'.$text.'</b></h5> ';
                        echo '<h5 style="font-size:14px;">';
                        echo $ket;
                        if ($codeakses == '2') {
                            $lapangan1 = "";
                            $lapangan2 = ""; 
                               if ($dataTransaksi[0]->booking_lapangan == 1) {
                                   $lapangan1 = "selected";
                               }elseif ($dataTransaksi[0]->booking_lapangan == 2) {
                                   $lapangan2 = "selected";
                               }  
                        echo '<ul> 
                                <li>
                                    Lapangan : 
                                    <select class="select-drop-jdwl-edit" name="_lpng_jadwal_lv2" >  
                                        <option value="1" '.$lapangan1.' >Lapangan 1</option>
                                        <option value="2" '.$lapangan2.' >Lapangan 2</option>
                                    </select>
                                </li>  
                                <li>
                                Jam Booking :
                                <select class="select-drop-jdwl-edit" name="_time_jadwal_lv2"  > '; 
                                for ($i=0; $i < 16 ; $i++) { 
                                    $nilai = 8 + $i; 
                                    if ($nilai < 10) {
                                        $nilai = "0".$nilai;
                                    }
                                    $nilai = $nilai .':00:00';
                                    if ($nilai == $dataTransaksi[0]->booking_start) {
                                        $pilihanselect = "selected";
                                    }else{
                                        $pilihanselect = "";

                                    }
                                    echo '<option value="'.$nilai.'"'.$pilihanselect.'>'.$nilai.'</option>';
                                }                                      
                        echo '  </select>
                                </li>
                              </ul>'; 
                        }  
                        echo '</h5>';
                        echo '<input type="hidden" name="_access_val_2" id="_access_val" value="'.$id_transaksi.'" readonly>';
                        echo '<div class="_file"></div>'; 
                echo '</div> ';
                echo '<hr class="hr-modal-spc">';
                echo '<div class="modal-footer text-center">  ';
                    echo '<button type="button" class="btn btn-danger" data-dismiss="modal">  &nbsp; &nbsp; &nbsp; &nbsp;Batal   &nbsp; &nbsp; &nbsp;  </button>';
                    echo '<button type="submit" class="btn btn-success">Lanjutkan  </button>'; 
                echo '</div>';
            echo '</form>';


        } 
    }


    public function progress_cencel_jadwal()
    {
        if(session()->get('level') == 2)
        {

            $Transaksi  = new TransaksiModel(); 
            $Histori = new HistoriModel();

            $id_transaksi = $this->request->getVar('_access_val_2');


            $dataTransaksi = $Transaksi->where([
                                        'id_transaksi' => $id_transaksi,
                                    ])->findAll(); 
            $dataHistori = $Histori->where([
                                        'kode_transaksi' => $dataTransaksi[0]->kode_transaksi,
                                        'id_identitas' => $dataTransaksi[0]->id_identitas,
                                    ])->findAll(); 

            foreach ($dataHistori as $v_dataHistori_1) {
                if ($v_dataHistori_1->booking_play == 1) {
                    //peringatan
                    session()->setFlashdata('pesanbookinglv2', '<div style="text-align:center"><b>BOOKING LAPANGAN Anda Tinggal 1 Jam</b>, Jika tetap menginginkan untuk Cancel waktu ini silahkan ke <a href="'.base_url().'/transaksi_pembayaran"><b>Data Transaksi Pembayaran</b></a></div>');
                    return redirect()->to(base_url('/jadwal'))->withInput(); 
                }else{
                    $kurangjammain = ($v_dataHistori_1->booking_play - 1);
                    $kurangharga = ($v_dataHistori_1->total_harga - $dataTransaksi[0]->total_harga);

                    $Histori->update($v_dataHistori_1->id_histori , [ 'booking_play' => $kurangjammain, 'total_harga' => $kurangharga ]);   
                    $Transaksi->delete($id_transaksi);

                    return redirect()->to(base_url('/jadwal'))->withInput(); 
  

                 }
            }




        }
    }
    


    public function progress_edit_jadwal()
    {
        if(session()->get('level') == 2)
        {
            $id_transaksi = $this->request->getVar('_access_val_2');
            $time = $this->request->getVar('_time_jadwal_lv2');
            $pecah_time = explode(':', $time);
            $lapangan = $this->request->getVar('_lpng_jadwal_lv2');

            $Transaksi  = new TransaksiModel(); 
            $Histori = new HistoriModel();
            $Harga = new HargaModel();

            $dataTransaksi = $Transaksi->join_spc_jadwal($id_transaksi); 
              
            $dataHistori = $Histori->where([
                                        'kode_transaksi' => $dataTransaksi[0]->kode_transaksi,
                                        'id_identitas' => $dataTransaksi[0]->id_identitas,
                                    ])->orderBy('booking_start', 'ASC')->findAll(); 

            $get_time_last = $Transaksi->where([
                                        'kode_transaksi' => $dataTransaksi[0]->kode_transaksi,
                                        'booking_lapangan' => $dataTransaksi[0]->booking_lapangan,
                                        'id_identitas' => $dataTransaksi[0]->id_identitas,
                                    ])->orderBy('booking_start', 'DESC')->findAll(); 

            $get_time_first = $Transaksi->where([
                                        'kode_transaksi' => $dataTransaksi[0]->kode_transaksi,
                                        'booking_lapangan' => $dataTransaksi[0]->booking_lapangan,
                                        'id_identitas' => $dataTransaksi[0]->id_identitas,
                                    ])->orderBy('booking_start', 'ASC')->findAll();

             //   if (($dataTransaksi[0]->booking_start <= $get_time_first[0]->booking_start)||($dataTransaksi[0]->booking_start >= $get_time_last[0]->booking_start)) {
                    
                    if ($time > "18:00:00") {
                       $harga_new = 2; 
                    }else if ($time <= "18:00:00") { 
                       $harga_new = 1; 
                    }
                    
                    $get_harga = $Harga->where([
                                        'booking_time' => $harga_new, 
                                    ])->findAll();
                    
                    $get_check_waktu_sama = $Transaksi->where([ 
                                        'tgl_booking_lapangan' => date("Y-m-d"),
                                        'booking_lapangan' => $dataTransaksi[0]->booking_lapangan,
                                        'booking_start' => $time, 
                                    ])->first(); 

                    if($get_check_waktu_sama){
                        session()->setFlashdata('pesanbookinglv2', '<div style="text-align:center">Maaf, Waktu Tersebut Sudah di Booking.</div>');
                        return redirect()->to(base_url('/jadwal'))->withInput();    
                    }else{ 
                        if ($dataTransaksi[0]->total_harga != $get_harga[0]->harga) { 
                            session()->setFlashdata('respon_bedaharga_lv2', '
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title text-center title-spc-ajxpembayaran" >
                                                                                    <b>Konfirmasi Perubahan</b>
                                                                                </h5> 
                                                                                <hr style="margin:10px 0 0 0; border-top:1px solid red">
                                                                            </div>
                                                                            <form action="'.base_url().'/jadwal/bedaharga" method="post" enctype="multipart/form-data">
                                                                                <div class="modal-body "> 
                                                                                    <div class="text-modal-spc">
                                                                                        <h5 style="font-size:14px;text-align:center;color:red">
                                                                                        <b>Apakah Anda Yakin?<br>Proses ini akan merubah Harga dan Anda harus Upload Bukti terbaru.</b>
                                                                                        </h5>  
                                                                                        <h5 style="font-size:14px; "> 
                                                                                            <ul>
                                                                                                <li> Nama Tim/Perwakilan : <b>'.$dataTransaksi[0]->tim.'/'.$dataTransaksi[0]->firstname.'</b></li>
                                                                                                <li> Jam Booking dari : <b>'.$dataTransaksi[0]->booking_start.'</b> Ke <b>: '.$time.'</b></li>
                                                                                                <li> Lapangan Booking dari Lapangan : <b>'.$dataTransaksi[0]->booking_lapangan.'</b> Ke Lapangan : <b>'.$lapangan.'</b></li>
                                                                                                <li> Untuk Perubahan Harga dari : <b> Rp '.number_format($dataTransaksi[0]->total_harga,2,',','.').'</b> Ke Harga : <b>Rp '.number_format($get_harga[0]->harga,2,',','.').' </b></li>
                                                                                            </ul>
                                                                                        </h5> 
                                                                                        <input type="hidden" name="_access_val_3" id="_access_val" value="'.$id_transaksi.'*'.$time.'*'.$lapangan.'*'.$get_harga[0]->harga.'" readonly> 
                                                                                        <div class="_file"></div>  
                                                                            </div>  
                                                                                <hr class="hr-modal-spc"> 
                                                                                <div class="modal-footer text-center">  
                                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">  &nbsp; &nbsp; &nbsp; &nbsp;Batal   &nbsp; &nbsp; &nbsp;  </button> 
                                                                                    <button type="submit" class="btn btn-success">Lanjutkan  </button> 
                                                                                </div> 
                                                                            </form>  
                                                    ');
                            return redirect()->to(base_url('/jadwal'))->withInput();   
                        }else{

                            $data = [
                                'booking_lapangan'  => $lapangan,
                                'booking_start'     => $time,    
                            ]; 
                            $Transaksi->update($id_transaksi, $data ); 

                            return redirect()->to(base_url('/jadwal'))->withInput(); 

                        }
                    } 
              //  }else{
              //      session()->setFlashdata('pesanbookinglv2', '<div style="text-align:center">Maaf, Waktu ini tidak dapat diubah, Silahkan Pilih Jam Booking Awal Atau Akhir dengan Nama Tim/Perwakilan yang sama.</div>');
              //      return redirect()->to(base_url('/jadwal'))->withInput();   
              //  } 

                
 
        }
    }



    public function progress_bedaharga_jadwal()
    {
        if(session()->get('level') == 2)
        {
            $_access_val_3 = $this->request->getVar('_access_val_3');
            $pecah__access_val_3 = explode("*", $_access_val_3);
            $id_transaksi = $pecah__access_val_3[0];
            $time = $pecah__access_val_3[1];
            $lapangan = $pecah__access_val_3[2];
            $newharga = $pecah__access_val_3[3];


            $Transaksi  = new TransaksiModel(); 
            $Histori = new HistoriModel();
            $Harga = new HargaModel();

            $dataTransaksi = $Transaksi->join_spc_jadwal($id_transaksi); 
            $dataHistori = $Histori->where([
                                        'kode_transaksi' => $dataTransaksi[0]->kode_transaksi,
                                        'id_identitas' => $dataTransaksi[0]->id_identitas,
                                    ])->findAll(); 

            if ($dataHistori[0]->booking_bukti_update != null) {
                $rubah_harga =   ($dataHistori[0]->new_total_harga - $dataTransaksi[0]->total_harga)+$newharga;
            }else{
                $rubah_harga =   ($dataHistori[0]->total_harga - $dataTransaksi[0]->total_harga)+$newharga;
            }
            
            $datahist = [
                "booking_status" => 1, 
                "booking_bukti_update" => 0, 
                "new_total_harga" => $rubah_harga, 
                'booking_lapangan' => $lapangan,   
            ]; 
            $Histori->update($dataHistori[0]->id_histori, $datahist );
            
            $data = [
                'booking_lapangan' => $lapangan,
                'booking_start'     => $time,   
                'total_harga'     => $newharga,  
                'booking_status'     => 1,    
            ]; 
            $Transaksi->update($id_transaksi, $data ); 


            return redirect()->to(base_url('/jadwal'))->withInput(); 



        }
    }











}