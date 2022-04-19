<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\IdentitasModel;  

class History extends Controller{



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
            echo view('v_history', $data);
            echo view('extent/footer', $data);

        }
    }



    
}