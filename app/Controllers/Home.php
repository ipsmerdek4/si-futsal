<?php

namespace App\Controllers; 
use CodeIgniter\Controller;
use App\Models\HargaModel;  
use App\Models\IdentitasModel;  
use App\Models\TransaksiModel;  




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

        $dataHarga      = $Harga->findAll();
        $dataIdentitas  = $Identitas->findAll();

        $dataTransaksi = $Transaksi->where([
                                        'tgl_booking_lapangan' => date("Y-m-d"), 
                                    ])->findAll(); 

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




}
