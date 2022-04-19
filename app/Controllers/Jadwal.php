<?php 
namespace App\Controllers;

use CodeIgniter\Controller;

class Jadwal extends Controller{


     public function index()
    { 
 
        if(session()->get('level') == 1)
        {
            $data = array(
                'menu' => '1c',
                'title' => 'Jadwal [SI-Futsal]', 
                'dtlv' => session()->get('level'),
                'unm' => session()->get('username'),
            );
            echo view('extent/header', $data);
            echo view('v_jadwal', $data);
            echo view('extent/footer', $data);

        }


    }





}