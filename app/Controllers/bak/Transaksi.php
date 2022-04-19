<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JadwalModel;  
use App\Models\TransaksiModel;  

class Transaksi extends Controller{

    public function index()
    { 
 
        if(session()->get('level') == 1)
        {
            $data = array(
                'menu' => '1d',
                'title' => 'Transaksi [SI-Futsal]', 
                'dtlv' => session()->get('level'),
                'unm' => session()->get('username'),
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
            if (!$this->validate([
                'lpng_book' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Pilihan Lapangan Harus diisi.',
                    ]
                ],  
                'wm_book' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Pilihan Waktu Mulai Harus diisi.',
                    ]
                ],  
                'wb_book' => [
                    'rules' => 'required',
                    'errors' => [
                        'required'   => 'Pilihan Waktu Bermain Harus diisi.',
                    ]
                ],  
            ])) {
                session()->setFlashdata('error', $this->validator->listErrors());
                return redirect()->to(base_url('/transaksi'))->withInput(); 
            } 


            $Transaksi = new TransaksiModel();

            $id_user    = session()->get('ID');
            $tgl_book   = $this->request->getVar('tgl_book');
            $lpng_book  = $this->request->getVar('lpng_book'); 
            $wm_book    = $this->request->getVar('wm_book');    
            $wb_book    = $this->request->getVar('wb_book');

            $datajadwal = $Transaksi->findAll();

     
            $data = array(
                'menu'      => '1d',
                'title'     => 'Transaksi [SI-Futsal]', 
                'dtlv'      => session()->get('level'),
                'unm'       => session()->get('username'),
                'disbtm'    => 1, //disable button
                /*  */
                'tgl_book'  => $tgl_book,
                'lpng_book' => $lpng_book,
                'wm_book'   => $wm_book,
                'wb_book'   => $wb_book, 
                /*  */
                'datajadwals'   => $datajadwal, 
                




            ); 
                echo view('extent/header', $data);
                echo view('v_transaksi', $data);
                echo view('extent/footer', $data); 
            
        }









    }

    


/* 

    public function trsk_ajx_prosess()
    { 
            $Jadwal = new JadwalModel();
            $TransaksiModel = new TransaksiModel();

            $id_user    = session()->get('ID');
            $tgl_book   = $this->request->getVar('tgl_book');
            $pecah_tgl_book = explode('/', $tgl_book);
            $tahunedit = explode(' ', $pecah_tgl_book[2]);
            $tgl_book_new   = $tahunedit[0].'-'.$pecah_tgl_book[1].'-'.$pecah_tgl_book[0];

            $lpng_book  = $this->request->getVar('lpng_book');
            $wm_book    = $this->request->getVar('wm_book');
            $pecah_wm_book = explode('-', $wm_book); 
            if ($pecah_wm_book[1] == 1) {
                $ket_waktu = "Siang";
            }elseif($pecah_wm_book[1] == 2) { 
                $ket_waktu = "Malam";
            }
            $pecah_wm_book2 = explode(':', $pecah_wm_book[0]);
            $wb_book    = $this->request->getVar('wb_book');
                           
            
            for ($i=0; $i < $wb_book; $i++) { 
                $total_jam = $pecah_wm_book2[0]+$i;
                $jam_view = $total_jam.':00';

                $datajadwal = $TransaksiModel->where3($tgl_book_new, $lpng_book, $jam_view);
                
                            
                echo "<pre>";
                print_r($datajadwal->booking_play);

             
 
                if ($total_jam > 23) {
                    echo "<br>tutup";
                }else{
                    echo $total_jam;
                }
                  
            }

            echo '
                <div class="row  ">
                    <div class="col-md-5 v-transaksi-spc">
                        Tanggal
                    </div> 
                    <div class="col-md-7 v-transaksi-spc">
                        '.$tgl_book.'
                    </div> 
                    <div class="col-md-5 v-transaksi-spc">
                        Booking Lapangan
                    </div> 
                    <div class="col-md-7 v-transaksi-spc">
                        '.$lpng_book.'
                    </div> 
                    <div class="col-md-5 v-transaksi-spc">
                        Booking Waktu Mulai
                    </div> 
                    <div class="col-md-7 v-transaksi-spc">
                        '.$pecah_wm_book[0].' ~ [ '.$ket_waktu.' ]
                    </div> 
                    <div class="col-md-5 v-transaksi-spc">
                        Booking Waktu Bermain
                    </div> 
                    <div class="col-md-7 v-transaksi-spc">
                        '.$wb_book.' Jam
                    </div> 
                    
                    <div class="col-md-12 v-transaksi-spc">
                        <br>
                        Check Ketersediaan ...
                    </div> 
                </div> 
                ';

    }
     */
    















}