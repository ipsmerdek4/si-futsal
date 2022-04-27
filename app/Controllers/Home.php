<?php

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\HargaModel;  
use App\Models\IdentitasModel;  
use App\Models\TransaksiModel;  
use App\Models\HistoriModel;   

 
class Home extends BaseController
{ 
    public function index()
    { 
        /* 

        'username' => $dataUser->username_users,
                            'ID' => $dataUser->id_users ,
                            'level' => $dataUser->level_users,
                            'logged_in' => TRUE
        */
    
        $Harga      = new HargaModel();
        $Identitas  = new IdentitasModel();
        $Transaksi  = new TransaksiModel(); 




        /* data lv1 (user)  */
        $dataHarga      = $Harga->findAll();
        $dataIdentitas  = $Identitas->findAll();

        $dataTransaksi = $Transaksi->where([
                                        'tgl_booking_lapangan' => date("Y-m-d"), 
                                    ])->findAll(); 
        /* end lv1 (user)  */

        /* data lv2 (petugas)  */


        /* end lv2 (petugas)  */


        if(session()->get('level') == 1)
        {
            $data = array(
                'menu'          => '1b',
                'title'         => 'Home [SI-Futsal]', 
                'dtlv'          => session()->get('level'),
                'unm'           => session()->get('username'),
                'dataHarga'     => $dataHarga,
                'dataIdentitas' => $dataIdentitas,
                'dataTransaksi' => $dataTransaksi,
            );
            echo view('extent/header', $data);
            echo view('v_home', $data);
            echo view('extent/footer', $data);

        }elseif(session()->get('level') == 2) {
        
        $data = array(
                'menu'          => '1b',
                'title'         => 'Home [SI-Futsal]', 
                'dtlv'          => session()->get('level'),
                'unm'           => session()->get('username'), 
            );
            echo view('extent/lv2/header', $data);
            echo view('v_home_lv2', $data);
            echo view('extent/lv2/footer', $data);


        }else{ 
            $data = array(
                'menu'          => '1b',
                'title'         => 'Home [SI-Futsal]', 
                'dtlv'          => session()->get('level'),
                'dataHarga'     => $dataHarga,
                'dataIdentitas' => $dataIdentitas,
                'dataTransaksi' => $dataTransaksi,
            );
            echo view('extent/header', $data);
            echo view('v_home', $data);
            echo view('extent/footer', $data);
        }
        
    }

    public function count_notif()
    {
        if(session()->get('level') == 2)
        {
            $Histori = new HistoriModel(); 

            $counthistory = $Histori->count_histori();

            echo json_encode(array('jumlah' => $counthistory[0]->id_histori ));

 
        }else{
            return redirect()->to(base_url('/'))->withInput();  
        } 
    }

    public function msg_notif()
    {
        if(session()->get('level') == 2)
        {
            $Histori = new HistoriModel(); 

            $datahistori = $Histori->limit_histori();

            echo json_encode(array("result" => $datahistori));




        }else{
            return redirect()->to(base_url('/'))->withInput();  
        } 
    }












}

    