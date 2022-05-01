<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\IdentitasModel;  
use App\Models\TransaksiModel;  
use App\Models\HistoriModel;   
use App\Models\HargaModel;  

class Laporan extends Controller{


    public function index()
    {
        if((session()->get('level') == 2)||(session()->get('level') == 3)) 
        {
    
            $Identitas = new IdentitasModel();

            $id_user = session()->get('ID'); 
            $getdatauserall = $Identitas->where([
                                        'id_users' => $id_user, 
                                    ])->findAll();   


            $data = array(
                'menu'          => '1g',
                'title'         => 'Laporan [SI-Futsal]', 
                'dtlv'          => session()->get('level'),
                'unm'           => session()->get('username'),  
                'getdatauserall' => $getdatauserall,
            );

            
            echo view('extent/lv2/header', $data);
            echo view('v_laporan_lv2', $data);
            echo view('extent/lv2/footer', $data);
         
  


        }else{
            return redirect()->to(base_url('/'))->withInput();  
        }
    }


    public function ctak()
    {
        if((session()->get('level') == 2)||(session()->get('level') == 3)) 
        {
            $dompdfs = new Dompdf;

            
            $Transaksi  = new TransaksiModel();
            $Histori    = new HistoriModel();  

            $tgl = $this->request->getVar('tgl_transaksi'); 

            $pecah_tgl_book = explode('-', $tgl); 
            $tgl_ne            = $pecah_tgl_book[2].'-'.$pecah_tgl_book[1].'-'.$pecah_tgl_book[0]; 
                
           
            $dataHistori = $Histori->join_where( $tgl_ne ); 
  
            $data = array( 
                'title'         => 'Laporan [SI-FUTSAL]',   
                'dataHistori'   => $dataHistori,  
                'dtlv'          => session()->get('level'),
                'unm'           => session()->get('username'), 
                'tgl'           => $tgl,
            ); 

            $html = view('v_Laporan_V_lv2', $data); 
            $dompdfs->set_option('isRemoteEnabled', TRUE);
            $dompdfs->set_option("isPhpEnabled", true); 
            $dompdfs->setPaper('A4', 'Portrait'); 
            $dompdfs->loadHtml($html); 
            $dompdfs->render();
            $dompdfs->stream('Laporan'.date('Ymdhis').'.pdf', array(
                    "Attachment" => false

            ));

        }else{
            return redirect()->to(base_url('/'))->withInput();  
        }
    } 

  

}