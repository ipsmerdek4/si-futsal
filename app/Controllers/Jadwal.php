<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IdentitasModel;  
use App\Models\TransaksiModel;  
use App\Models\HistoriModel;  

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


                
        }
    }


}